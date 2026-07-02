<?php
// Set environment variables for static generation
putenv('APP_KEY=base64:LY08cEpLZc/1TC+BkIca0wWfZb8fk8jCEftgLAW9nhs=');
putenv('APP_ENV=production');
putenv('APP_DEBUG=false');

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Ensure dist directory exists
$distDir = __DIR__ . '/dist';
if (!is_dir($distDir)) {
    mkdir($distDir, 0755, true);
}

// Get products from database
$products = \App\Models\Product::all();

// Create a dummy ViewErrorBag for the view to avoid Undefined Variable $errors
$errors = new \Illuminate\Support\ViewErrorBag();

// Render the main view
$html = view('home', compact('products', 'errors'))->render();

// Rewrite the checkout form submission to use WhatsApp client-side
$whatsappScript = '
<script>
document.addEventListener("DOMContentLoaded", function() {
    const orderForm = document.getElementById("orderForm");
    if (orderForm) {
        // Change form submit event
        orderForm.addEventListener("submit", function(e) {
            e.preventDefault();
            
            const name = document.getElementById("customer_name").value;
            const phone = document.getElementById("customer_phone").value;
            const address = document.getElementById("customer_address").value;
            const qty = document.getElementById("quantity").value;
            const productName = document.getElementById("modalProductName").textContent;
            const notes = document.getElementsByName("notes")[0] ? document.getElementsByName("notes")[0].value : "";
            const paymentSelect = document.getElementsByName("payment_method")[0];
            const payment = paymentSelect ? paymentSelect.options[paymentSelect.selectedIndex].text : "COD";
            const totalPrice = document.getElementById("totalPrice").textContent;

            const message = "Halo Khazanah Cake & Bakery, saya ingin memesan:\n\n" +
                            "✦ Produk: " + productName + "\n" +
                            "✦ Jumlah: " + qty + "\n" +
                            "✦ Total Harga: " + totalPrice + "\n\n" +
                            "Detail Pengiriman:\n" +
                            "✦ Nama: " + name + "\n" +
                            "✦ No. HP/WA: " + phone + "\n" +
                            "✦ Alamat: " + address + "\n" +
                            "✦ Metode Pembayaran: " + payment + "\n" +
                            (notes ? "✦ Catatan: " + notes + "\n" : "");

            const encodedMessage = encodeURIComponent(message);
            const whatsappUrl = "https://wa.me/6285263752742?text=" + encodedMessage;
            window.open(whatsappUrl, "_blank");
            closeOrderModal();
        });
    }
});
</script>
';

// Inject the WhatsApp redirect script before </body>
$html = str_replace('</body>', $whatsappScript . "\n</body>", $html);

// Remove absolute localhost domain so assets load relatively
$html = str_replace('http://localhost', '', $html);

// Remove auth-related elements from static HTML (Masuk/Daftar buttons, dividers)
// Desktop: remove the divider + auth links block
$html = preg_replace('/<div class="h-6 w-px bg-\[#d4af37\]\/30 mx-2"><\/div>.*?<\/div>\s*(?=\s*<!--\s*Mobile Menu Button)/s', '</div>' . "\n", $html);

// Mobile: remove auth links (Masuk, Daftar) and the hr divider
$html = preg_replace('/<hr class="border-\[#d4af37\]\/20 my-2">.*?(?=<\/div>\s*<\/div>\s*<\/nav>)/s', '', $html);

echo "Removed auth links from static HTML\n";

// Save rendered HTML as index.html in dist
file_put_contents($distDir . '/index.html', $html);
echo "Generated dist/index.html\n";

// Helper function to copy directories
function copyDir($src, $dst) {
    if (!is_dir($src)) return;
    @mkdir($dst, 0755, true);
    $dir = opendir($src);
    while (false !== ($file = readdir($dir))) {
        if (($file != '.') && ($file != '..')) {
            if (is_dir($src . '/' . $file)) {
                copyDir($src . '/' . $file, $dst . '/' . $file);
            } else {
                copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}

// Copy compiled assets from public/build to dist/build
if (is_dir(__DIR__ . '/public/build')) {
    copyDir(__DIR__ . '/public/build', $distDir . '/build');
    echo "Copied public/build to dist/build\n";
} else {
    echo "Warning: public/build not found. Run npm run build first.\n";
}

// Copy images from public/images to dist/images
if (is_dir(__DIR__ . '/public/images')) {
    copyDir(__DIR__ . '/public/images', $distDir . '/images');
    echo "Copied public/images to dist/images\n";
} else {
    echo "Warning: public/images not found.\n";
}
