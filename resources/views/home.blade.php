@extends('layouts.app')

@section('title', 'Khazanah Cake & Bakery — Premium Artisan Bakery')

@section('content')

<!-- ============================
     HERO SECTION
     ============================ -->
<section id="beranda" class="relative min-h-screen flex items-center justify-center overflow-hidden bg-[#0e0e0e]">

    <!-- Background polos -->
    <div class="absolute inset-0 z-0">
        <!-- Gradient background -->
        <div class="absolute inset-0 bg-gradient-to-br from-[#0e0e0e] via-[#151515] to-[#0a0a0a]"></div>

        <!-- Efek cahaya emas -->
        <div class="absolute top-1/4 left-1/2 -translate-x-1/2 w-[600px] h-[600px] rounded-full bg-[#d4af37]/5 blur-[180px]"></div>

        <!-- Overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/20 via-transparent to-black/40"></div>
    </div>

    <!-- Decorative elements -->
    <div class="absolute top-1/4 left-10 w-px h-32 bg-gradient-to-b from-transparent via-[#d4af37]/40 to-transparent hidden lg:block"></div>
    <div class="absolute top-1/4 right-10 w-px h-32 bg-gradient-to-b from-transparent via-[#d4af37]/40 to-transparent hidden lg:block"></div>

    <!-- Hero Content -->
    <div class="relative z-10 text-center px-6 max-w-5xl mx-auto pt-24">
        <div class="section-subtitle mb-4 opacity-0 animate-fadeInUp">
            ✦ Premium Artisan Bakery ✦
        </div>

        <h1 class="section-title text-5xl md:text-7xl lg:text-8xl mb-6 opacity-0 animate-fadeInUp delay-100"
            style="font-family:'Cormorant Garamond',serif; color:#d4af37;">
            Khazanah
            <span class="block text-[#f7e080] italic" style="font-size:0.7em;">
                Cake & Bakery
            </span>
        </h1>

        <div class="gold-divider mb-6 opacity-0 animate-fadeInUp delay-200"></div>

        <p class="text-lg md:text-xl text-[#f7e080]/80 max-w-2xl mx-auto mb-10 leading-relaxed opacity-0 animate-fadeInUp delay-200">
            Setiap kreasi kami adalah karya seni kuliner — diracik dari bahan-bahan pilihan terbaik, dipanggang dengan keahlian, dan dipersembahkan dengan keanggunan yang tak tertandingi.
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 opacity-0 animate-fadeInUp delay-300">
            <a href="#produk" class="btn-gold px-8 py-4 text-sm">
                <span>✦ Lihat Produk</span>
            </a>

            <a href="#tentang" class="btn-outline-gold px-8 py-4 text-sm">
                <span>Tentang Kami</span>
            </a>
        </div>
    </div>
</section>

<!-- ============================
     TENTANG SECTION
     ============================ -->
<section id="tentang" class="py-24 px-6 bg-[#0e0e0e]">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <!-- Image Side -->
            <div class="relative">
                <div class="relative aspect-[4/5] rounded-3xl overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.5)]">
                    <img src="{{ asset('images/Ummi.jpeg') }}" alt="Ummi Khazanah" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0e0e0e]/80 to-transparent"></div>
                </div>
                <!-- Badge -->
                <div class="absolute bottom-6 left-6 bg-[#0a0a0a]/90 border border-[#d4af37]/30 px-6 py-4 rounded-2xl backdrop-blur-sm shadow-xl">
                    <div class="text-[#d4af37] text-3xl font-bold" style="font-family:'Cormorant Garamond',serif;">2019</div>
                    <div class="text-xs tracking-widest text-[#f3e9c6]/60 uppercase">Berdiri Sejak</div>
                </div>
            </div>

            <!-- Text Side -->
            <div>
                <p class="section-subtitle mb-3">✦ Kisah Kami ✦</p>
                <h2 class="section-title mb-4">Seni & Cinta<br><span class="text-[#f7e080]">Dalam Setiap Loyang</span></h2>
                <div class="gold-divider mb-6" style="margin-left:0;margin-right:auto;"></div>
                <p class="text-[#f7e080]/70 leading-relaxed mb-6 text-justify">
                    Khazanah Bakery adalah UMKM yang memproduksi berbagai jenis roti yang sudah ditekuni oleh Owner sendiri yaitu Rezki Viona sejak tahun 2019. Pada awalnya, pekerjaan ini hanya sebuah hobi bagi sang Owner. Jika ada orang yang memesan dan ingin membeli rotinya, barulah ia akan menjualnya.
                </p>
                <p class="text-[#f7e080]/70 leading-relaxed mb-8 text-justify">
                    Pada tahun 2020 ia mulai fokus untuk mengembangkan usaha roti tersebut sehingga menjadi usaha yang maju seperti sekarang. Ia mengaku bahwa di tengah-tengah banyaknya kompetitor lain di bidang usaha roti, Khazanah Bakery berhasil untuk bertahan di pasaran dan selalu menjadi pilihan pelanggan-pelanggannya. Jadi, setiap roti yang dipanggang di Khazanah Bakery bukan hanya soal rasa, tapi juga tentang cinta, ketulusan, dan semangat pantang menyerah dari sang Owner. Karena bagi kami, roti yang enak adalah roti yang dibuat dengan hati.
                </p>
                <div class="grid grid-cols-2 gap-4 mb-8">
                    <div class="bg-[#141414] border border-[#d4af37]/10 p-5 rounded-2xl transition-all duration-300 hover:border-[#d4af37]/40 hover:-translate-y-1">
                        <div class="text-[#d4af37] text-2xl mb-2">🌿</div>
                        <div class="text-sm font-semibold text-[#f3e9c6] mb-1">Bahan Alami</div>
                        <div class="text-xs text-[#f3e9c6]/50">Tanpa pengawet buatan</div>
                    </div>
                    <div class="bg-[#141414] border border-[#d4af37]/10 p-5 rounded-2xl transition-all duration-300 hover:border-[#d4af37]/40 hover:-translate-y-1">
                        <div class="text-[#d4af37] text-2xl mb-2">👨‍🍳</div>
                        <div class="text-sm font-semibold text-[#f3e9c6] mb-1">Chef Ahli</div>
                        <div class="text-xs text-[#f3e9c6]/50">Terlatih</div>
                    </div>
                    <div class="bg-[#141414] border border-[#d4af37]/10 p-5 rounded-2xl transition-all duration-300 hover:border-[#d4af37]/40 hover:-translate-y-1">
                        <div class="text-[#d4af37] text-2xl mb-2">🎁</div>
                        <div class="text-sm font-semibold text-[#f3e9c6] mb-1">Custom Order</div>
                        <div class="text-xs text-[#f3e9c6]/50">Sesuai keinginan Anda</div>
                    </div>
                    <div class="bg-[#141414] border border-[#d4af37]/10 p-5 rounded-2xl transition-all duration-300 hover:border-[#d4af37]/40 hover:-translate-y-1">
                        <div class="text-[#d4af37] text-2xl mb-2">🚚</div>
                        <div class="text-sm font-semibold text-[#f3e9c6] mb-1">Pengiriman Cepat</div>
                        <div class="text-xs text-[#f3e9c6]/50">Area kota & sekitarnya</div>
                    </div>
                </div>
                <a href="#produk" class="btn-gold px-8 py-4 inline-flex">
                    <span>Jelajahi Produk Kami</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ============================
     PRODUK SECTION
     ============================ -->
<section id="produk" class="py-16 md:py-24 px-3 md:px-6 bg-[#0a0a0a]">
    <div class="max-w-7xl mx-auto">
        <!-- Section Header -->
        <div class="text-center mb-10 md:mb-16">
            <p class="section-subtitle mb-2 md:mb-3">✦ Menu Kami ✦</p>
            <h2 class="section-title mb-3 md:mb-4">Koleksi Premium</h2>
            <div class="gold-divider"></div>
            <p class="text-[#f7e080]/60 mt-4 max-w-xl mx-auto text-xs md:text-base px-4 md:px-0">Setiap produk dibuat segar setiap hari dengan bahan-bahan terpilih. Pilih favorit Anda dan pesan langsung.</p>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-3 md:gap-8">
            @foreach($products as $product)
            <div class="card-product group" id="product-{{ $product->id }}">
                <!-- Product Image -->
                <div class="relative overflow-hidden aspect-square md:aspect-[4/3] rounded-t-xl md:rounded-t-2xl">
                    <img src="{{ Str::startsWith($product->image, 'http') ? $product->image : asset('image/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0e0e0e] via-transparent to-transparent opacity-80"></div>
                    <!-- Category Badge -->
                    <div class="absolute top-2 left-2 md:top-4 md:left-4">
                        <span class="bg-[#d4af37]/90 text-[#0a0a0a] text-[8px] md:text-[10px] font-bold tracking-widest uppercase px-2 md:px-4 py-1 md:py-1.5 rounded-full shadow-lg">
                            {{ ucfirst($product->category) }}
                        </span>
                    </div>
                    <!-- Price Badge -->
                    <div class="absolute bottom-2 right-2 md:bottom-4 md:right-4">
                        <span class="bg-[#0a0a0a]/80 border border-[#d4af37]/40 text-[#d4af37] text-[11px] md:text-sm font-bold px-2 md:px-4 py-1 md:py-1.5 rounded-full backdrop-blur-sm shadow-lg" style="font-family:'Cormorant Garamond',serif;">
                            {{ $product->formatted_price }}
                        </span>
                    </div>
                </div>

                <!-- Product Info -->
                <div class="p-3 md:p-6 relative z-10 flex flex-col md:block h-full md:h-auto">
                    <h3 class="text-[13px] md:text-xl font-bold text-[#d4af37] mb-1 md:mb-2 line-clamp-1 md:line-clamp-none" style="font-family:'Cormorant Garamond',serif;">{{ $product->name }}</h3>
                    <p class="text-[10px] md:text-sm text-[#f3e9c6]/60 leading-relaxed mb-3 md:mb-6 line-clamp-2">{{ $product->description }}</p>
                    <div class="mt-auto md:mt-0">
                        <button
                            onclick="openOrderModal({{ $product->id }}, '{{ addslashes($product->name) }}', {{ $product->price }}, '{{ $product->formatted_price }}')"
                            class="btn-gold w-full !py-2 md:!py-3.5 text-[10px] md:text-[11px] shadow-lg shadow-[#d4af37]/20 !px-1 md:!px-8">
                            <span>✦ Beli </span>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ============================
     KONTAK SECTION
     ============================ -->
<section id="kontak" class="py-24 px-6 bg-[#0a0a0a]">
    <div class="max-w-7xl mx-auto">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <p class="section-subtitle mb-3">✦ Hubungi Kami ✦</p>
            <h2 class="section-title mb-4">Temukan Kami</h2>
            <div class="gold-divider"></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Contact Info Cards -->
            <div class="lg:col-span-1 grid grid-cols-2 lg:grid-cols-1 gap-4">
                <div class="bg-[#141414] border border-[#d4af37]/15 p-5 hover:border-[#d4af37]/40 transition-colors duration-300">
                    <div class="w-10 h-10 border border-[#d4af37]/30 flex items-center justify-center mb-3 text-xl">📍</div>
                    <h4 class="text-[#d4af37] font-semibold mb-2" style="font-family:'Cormorant Garamond',serif;">Lokasi</h4>
                    <p class="text-[11px] sm:text-xs text-[#f7e080]/60 leading-relaxed">Jl. Banjarmasin Blok O/15 Asratek,<br>Ulak Karang Selatan, Padang Utara</p>
                </div>
                <div class="bg-[#141414] border border-[#d4af37]/15 p-5 hover:border-[#d4af37]/40 transition-colors duration-300">
                    <div class="w-10 h-10 border border-[#d4af37]/30 flex items-center justify-center mb-3 text-xl">📞</div>
                    <h4 class="text-[#d4af37] font-semibold mb-2" style="font-family:'Cormorant Garamond',serif;">Hubungi</h4>
                    <p class="text-[11px] sm:text-xs text-[#f7e080]/60">0852-6375-2742</p>
                    <a href="https://wa.me/6285263752742" target="_blank" class="text-[10px] sm:text-xs text-[#d4af37] hover:underline mt-2 inline-block">Chat via WhatsApp →</a>
                </div>
                <div class="col-span-2 lg:col-span-1 bg-[#141414] border border-[#d4af37]/15 p-5 hover:border-[#d4af37]/40 transition-colors duration-300">
                    <div class="w-10 h-10 border border-[#d4af37]/30 flex items-center justify-center mb-3 text-xl">🕐</div>
                    <h4 class="text-[#d4af37] font-semibold mb-2" style="font-family:'Cormorant Garamond',serif;">Jam Operasional</h4>
                    <div class="text-xs text-[#f7e080]/60 space-y-1">
                        <div class="flex justify-between"><span>Senin – Sabtu</span><span class="text-[#d4af37]">07:00 – 18:00</span></div>
                        <div class="flex justify-between"><span>Minggu</span><span class="text-[#d4af37]">Tutup</span></div>
                    </div>
                </div>
            </div>

            <!-- Embedded Google Map -->
            <div class="lg:col-span-2 bg-[#141414] border border-[#d4af37]/15 p-2 rounded-xl overflow-hidden relative group h-[450px] lg:h-auto lg:min-h-[450px]">
                <!-- Elegant overlay to match the premium dark/gold theme -->
                <div class="absolute inset-0 bg-[#d4af37]/10 z-10 pointer-events-none group-hover:bg-transparent transition-colors duration-700"></div>
                
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.2882895470533!2d100.3541295!3d-0.9008272!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b8ad28fbf6ab%3A0xc4ab5f973c683b58!2sJl.%20Banjarmasin%2C%20Ulak%20Karang%20Sel.%2C%20Kec.%20Padang%20Utara%2C%20Kota%20Padang%2C%20Sumatera%20Barat!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
                    width="100%" 
                    height="100%" 
                    style="border:0; position: absolute; inset: 0;"
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade"
                    class="absolute inset-0 w-full h-full filter grayscale-[50%] sepia-[40%] opacity-80 group-hover:filter-none group-hover:opacity-100 transition-all duration-700">
                </iframe>
            </div>
        </div>
    </div>
</section>

<!-- ============================
     ORDER MODAL
     ============================ -->
<div id="orderModal" class="fixed inset-0 z-[200] flex items-center justify-center hidden">
    <!-- Backdrop -->
    <div id="modalBackdrop" class="absolute inset-0 bg-[#0a0a0a]/90 backdrop-blur-md" onclick="closeOrderModal()"></div>

    <!-- Modal Box -->
    <div class="relative z-10 bg-[#141414] border border-[#d4af37]/30 w-full max-w-lg mx-4 rounded-3xl shadow-2xl max-h-[90vh] overflow-y-auto">
        <!-- Modal Header -->
        <div class="bg-gradient-to-r from-[#0a0a0a] to-[#1a1a1a] border-b border-[#d4af37]/20 px-8 py-6 flex items-center justify-between">
            <div>
                <p class="text-[10px] tracking-widest uppercase text-[#d4af37]/60 mb-1">✦ Form Pemesanan ✦</p>
                <h3 id="modalProductName" class="text-xl font-bold text-[#d4af37]" style="font-family:'Cormorant Garamond',serif;">Nama Produk</h3>
            </div>
            <button onclick="closeOrderModal()" class="text-[#f3e9c6]/40 hover:text-[#d4af37] transition-colors text-2xl leading-none">&times;</button>
        </div>

        <!-- Product Info Strip -->
        <div class="px-8 py-4 bg-[#0e0e0e]/50 border-b border-[#d4af37]/10 flex items-center justify-between">
            <span class="text-sm text-[#f3e9c6]/60">Harga Satuan:</span>
            <span id="modalProductPrice" class="text-[#d4af37] font-bold" style="font-family:'Cormorant Garamond',serif;">Rp 0</span>
        </div>

        <!-- Form -->
        <form id="orderForm" action="{{ route('order.store') }}" method="POST" class="px-8 py-6 space-y-5">
            @csrf
            <input type="hidden" name="product_id" id="modalProductId">

            <!-- Validation Errors -->
            @if($errors->any())
            <div class="bg-red-500/10 border border-red-500/30 p-4">
                <ul class="text-sm text-red-400 space-y-1">
                    @foreach($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div>
                <label class="block text-[11px] tracking-widest uppercase text-[#d4af37]/70 mb-2">Nama Lengkap *</label>
                <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name', Auth::check() ? Auth::user()->name : '') }}"
                       placeholder="Masukkan nama Anda" class="input-gold" required>
            </div>
            <div>
                <label class="block text-[11px] tracking-widest uppercase text-[#d4af37]/70 mb-2">Nomor Telepon / WhatsApp *</label>
                <input type="tel" name="customer_phone" id="customer_phone" value="{{ old('customer_phone') }}"
                       placeholder="Contoh: 085263752742" class="input-gold" required>
            </div>
            <div>
                <label class="block text-[11px] tracking-widest uppercase text-[#d4af37]/70 mb-2">Alamat Pengiriman *</label>
                <textarea name="customer_address" id="customer_address" rows="3"
                          placeholder="Alamat lengkap pengiriman..." class="input-gold resize-none" required>{{ old('customer_address') }}</textarea>
            </div>
            <div>
                <label class="block text-[11px] tracking-widest uppercase text-[#d4af37]/70 mb-2">Jumlah *</label>
                <div class="flex items-center gap-0">
                    <button type="button" onclick="decreaseQty()" class="w-12 h-12 bg-[#0a0a0a] border border-[#d4af37]/30 text-[#d4af37] text-xl hover:bg-[#d4af37] hover:text-[#0a0a0a] transition-all duration-200 flex-shrink-0 rounded-l-xl">−</button>
                    <input type="number" name="quantity" id="quantity" value="{{ old('quantity', 1) }}"
                           min="1" max="100" class="input-gold text-center border-x-0 w-20 h-12 rounded-none" required readonly>
                    <button type="button" onclick="increaseQty()" class="w-12 h-12 bg-[#0a0a0a] border border-[#d4af37]/30 text-[#d4af37] text-xl hover:bg-[#d4af37] hover:text-[#0a0a0a] transition-all duration-200 flex-shrink-0 rounded-r-xl">+</button>
                    <div class="flex-1 ml-4 text-right">
                        <p class="text-[10px] text-[#f3e9c6]/50 uppercase tracking-wider">Total</p>
                        <p id="totalPrice" class="text-[#d4af37] font-bold text-lg" style="font-family:'Cormorant Garamond',serif;">Rp 0</p>
                    </div>
                </div>
            </div>
            <div>
                <label class="block text-[11px] tracking-widest uppercase text-[#d4af37]/70 mb-2">Metode Pembayaran *</label>
                <select name="payment_method" class="input-gold w-full" required>
                    <option value="transfer">Transfer Bank (Upload Bukti)</option>
                    <option value="cod">Cash on Delivery (COD)</option>
                </select>
            </div>
            <div>
                <label class="block text-[11px] tracking-widest uppercase text-[#d4af37]/70 mb-2">Catatan Pesanan (opsional)</label>
                <textarea name="notes" rows="2"
                          placeholder="Contoh: tanpa gula, topping spesial, waktu pengiriman..." class="input-gold resize-none">{{ old('notes') }}</textarea>
            </div>

            <button type="submit" class="btn-gold w-full py-4 text-[11px] mt-2 shadow-lg shadow-[#d4af37]/20">
                <span>✦ Konfirmasi Pesanan</span>
            </button>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script>
    let currentProductPrice = 0;

    function formatRupiah(amount) {
        return 'Rp ' + amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }

    function openOrderModal(productId, productName, productPrice, productPriceFormatted) {
        currentProductPrice = productPrice;
        document.getElementById('modalProductId').value = productId;
        document.getElementById('modalProductName').textContent = productName;
        document.getElementById('modalProductPrice').textContent = productPriceFormatted;
        document.getElementById('quantity').value = 1;
        updateTotal();

        const modal = document.getElementById('orderModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeOrderModal() {
        const modal = document.getElementById('orderModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = '';
    }

    function updateTotal() {
        const qty = parseInt(document.getElementById('quantity').value) || 1;
        const total = qty * currentProductPrice;
        document.getElementById('totalPrice').textContent = formatRupiah(total);
    }

    function increaseQty() {
        const input = document.getElementById('quantity');
        const val = parseInt(input.value) || 1;
        if (val < 100) {
            input.value = val + 1;
            updateTotal();
        }
    }

    function decreaseQty() {
        const input = document.getElementById('quantity');
        const val = parseInt(input.value) || 1;
        if (val > 1) {
            input.value = val - 1;
            updateTotal();
        }
    }

    // Close on Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeOrderModal();
    });

    // Scroll reveal animation
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.card-product').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });

    // Re-open modal if there are validation errors
    @if($errors->any() && old('product_id'))
    const prodId = {{ old('product_id') }};
    const prodEl = document.getElementById('product-' + prodId);
    if (prodEl) {
        const btn = prodEl.querySelector('button');
        if (btn) btn.click();
    }
    @endif
</script>
@endsection

