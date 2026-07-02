<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Khazanah Cake & Bakery — Premium handcrafted cakes, pastries, and artisan breads made with love. Order online and experience luxury baking.">
    <title>@yield('title', 'Khazanah Cake & Bakery — Premium Artisan Bakery')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,700;1,500&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('head')
</head>
<body class="bg-[#0e0e0e] text-[#f7e080] min-h-screen">

    <!-- Navbar -->
    <nav id="navbar" class="navbar-glass fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-[#080808]/80 backdrop-blur-md">
        <div class="w-full px-6 lg:px-12 py-4 flex items-center justify-between">
            <!-- Left: Logo -->
            <div class="flex flex-1 justify-start">
                <a href="{{ url('/') }}" class="inline-flex items-center gap-3 z-50">
                    <img src="/images/logo.jpg" alt="Khazanah Bakery Logo" class="h-10 w-10 rounded-full object-cover border border-[#d4af37]/30 shadow-lg bg-white p-0.5">
                    <div class="hidden sm:flex flex-col">
                        <span class="text-xl font-bold tracking-widest text-[#d4af37]" style="font-family:'Cormorant Garamond',serif;">KHAZANAH</span>
                        <span class="text-[8px] tracking-[0.25em] text-[#f3e9c6]/60 uppercase">Cake & Bakery</span>
                    </div>
                </a>
            </div>

            <!-- Center: Desktop Nav Links -->
            <div class="hidden md:flex justify-center items-center gap-8">
                <a href="{{ url('/') }}#beranda" class="nav-link text-[#f3e9c6] hover:text-[#d4af37] text-[13px] tracking-widest uppercase transition-colors duration-300 relative group font-semibold">
                    Beranda
                </a>
                <a href="{{ url('/') }}#tentang" class="nav-link text-[#f3e9c6] hover:text-[#d4af37] text-[13px] tracking-widest uppercase transition-colors duration-300 relative group font-semibold">
                    Tentang
                </a>
                <a href="{{ url('/') }}#produk" class="nav-link text-[#f3e9c6] hover:text-[#d4af37] text-[13px] tracking-widest uppercase transition-colors duration-300 relative group font-semibold">
                    Produk
                </a>
                <a href="{{ url('/') }}#kontak" class="nav-link text-[#f3e9c6] hover:text-[#d4af37] text-[13px] tracking-widest uppercase transition-colors duration-300 relative group font-semibold">
                    Kontak
                </a>
            </div>

            <!-- Right: Auth & Mobile Menu Button -->
            <div class="flex flex-1 justify-end items-center gap-4">
                <div id="navbar-auth-desktop" class="hidden md:flex items-center gap-4">
                    @guest

                    @else
                        @if(Auth::user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" class="btn-outline-gold px-4 py-2 text-[11px]">Admin Panel</a>
                        @else
                            <a href="{{ route('user.dashboard') }}" class="btn-outline-gold px-4 py-2 text-[11px]">Dashboard Saya</a>
                        @endif
                        <form action="{{ route('logout') }}" method="POST" class="inline flex items-center">
                            @csrf
                            <button type="submit" class="text-[#f87171] hover:text-red-400 text-[13px] tracking-widest uppercase transition-colors font-semibold">Keluar</button>
                        </form>
                    @endguest
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobileMenuBtn" class="md:hidden text-[#d4af37] p-2" aria-label="Toggle menu">
                    <svg id="menuIcon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg id="closeIcon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden border-t border-[#d4af37]/15 bg-[#0e0e0e]/95 backdrop-blur-lg">
            <div class="flex flex-col py-4 px-6 gap-4">
                <a href="{{ url('/') }}#beranda" class="text-[#f3e9c6] hover:text-[#d4af37] text-sm tracking-widest uppercase py-2">Beranda</a>
                <a href="{{ url('/') }}#tentang" class="text-[#f3e9c6] hover:text-[#d4af37] text-sm tracking-widest uppercase py-2">Tentang</a>
                <a href="{{ url('/') }}#produk" class="text-[#f3e9c6] hover:text-[#d4af37] text-sm tracking-widest uppercase py-2">Produk</a>
                <a href="{{ url('/') }}#kontak" class="text-[#f3e9c6] hover:text-[#d4af37] text-sm tracking-widest uppercase py-2">Kontak</a>
                
                <div id="navbar-auth-mobile" class="flex flex-col gap-2">
                    <hr class="border-[#d4af37]/20 my-2">
                    @guest

                    @else
                        @if(Auth::user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" class="btn-outline-gold text-xs px-5 py-3 w-full text-center">Admin Panel</a>
                        @else
                            <a href="{{ route('user.dashboard') }}" class="btn-outline-gold text-xs px-5 py-3 w-full text-center">Dashboard Saya</a>
                        @endif
                        <form action="{{ route('logout') }}" method="POST" class="mt-2 w-full">
                            @csrf
                            <button type="submit" class="btn-danger w-full py-3">Keluar</button>
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-[#080808] border-t border-[#d4af37]/15">
        <div class="max-w-4xl mx-auto px-6 py-16 flex flex-col items-center text-center">

            <!-- Brand -->
            <div class="flex flex-col items-center mb-8">
                <img src="/images/logo.jpg" alt="Khazanah Bakery Logo" class="h-16 w-16 rounded-full object-cover border-2 border-[#d4af37]/30 shadow-lg bg-white p-0.5 mb-4">
                <span class="text-[#d4af37] font-bold text-3xl leading-none" style="font-family:'Cormorant Garamond',serif;">Khazanah</span>
                <span class="text-[10px] tracking-[0.4em] uppercase text-[#f3e9c6]/50 mt-2">Cake &amp; Bakery</span>
            </div>
            
            <p class="text-[13px] text-[#f3e9c6]/55 leading-relaxed max-w-lg mb-10">
                Menghadirkan pengalaman bakery premium dengan bahan pilihan terbaik dan cita rasa tak terlupakan untuk setiap momen spesial Anda.
            </p>

            <!-- Navigation Links -->
            <div class="flex flex-wrap justify-center gap-6 md:gap-10 mb-10">
                <a href="{{ url('/') }}#beranda" class="text-[13px] uppercase tracking-widest text-[#f3e9c6]/60 hover:text-[#d4af37] transition-colors duration-300">Beranda</a>
                <a href="{{ url('/') }}#tentang" class="text-[13px] uppercase tracking-widest text-[#f3e9c6]/60 hover:text-[#d4af37] transition-colors duration-300">Tentang</a>
                <a href="{{ url('/') }}#produk" class="text-[13px] uppercase tracking-widest text-[#f3e9c6]/60 hover:text-[#d4af37] transition-colors duration-300">Produk</a>
                <a href="{{ url('/') }}#kontak" class="text-[13px] uppercase tracking-widest text-[#f3e9c6]/60 hover:text-[#d4af37] transition-colors duration-300">Kontak</a>
            </div>

            <!-- Social Media Icons -->
            <div class="flex items-center gap-6">
                <!-- Instagram -->
                <a href="https://instagram.com/khazanah.bakery" target="_blank" class="w-10 h-10 rounded-full border border-[#d4af37]/20 flex items-center justify-center text-[#d4af37]/60 hover:text-[#080808] hover:bg-[#d4af37] transition-all duration-300">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                    </svg>
                </a>
                <!-- WhatsApp -->
                <a href="https://wa.me/6285263752742" target="_blank" class="w-10 h-10 rounded-full border border-[#d4af37]/20 flex items-center justify-center text-[#d4af37]/60 hover:text-[#080808] hover:bg-[#d4af37] transition-all duration-300">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                </a>
            </div>

        </div>

        <!-- Copyright Bar -->
        <div class="border-t border-[#d4af37]/10 bg-[#060606]">
            <div class="max-w-7xl mx-auto px-6 py-5 flex flex-col sm:flex-row items-center justify-between gap-3">
                <p class="text-xs text-[#f3e9c6]/35">&copy; {{ date('Y') }} Khazanah Cake &amp; Bakery. All Rights Reserved.</p>
                <p class="text-xs text-[#f3e9c6]/20 tracking-wider">Crafted with ♥ in Indonesia</p>
            </div>
        </div>
    </footer>

    <!-- Flash Messages -->
    @if(session('success'))
    <div id="flashMsg" class="fixed bottom-6 right-6 z-[100] bg-[#141414] border border-[#d4af37]/40 px-6 py-4 shadow-2xl flex items-center gap-3 max-w-sm animate-fadeInUp">
        <div class="w-2 h-2 rounded-full bg-[#4ade80] animate-pulse flex-shrink-0"></div>
        <p class="text-sm text-[#f7e080]">{{ session('success') }}</p>
        <button onclick="this.parentElement.remove()" class="ml-auto text-[#d4af37]/50 hover:text-[#d4af37]">✕</button>
    </div>
    @endif

    @if(session('error'))
    <div id="flashMsgErr" class="fixed bottom-6 right-6 z-[100] bg-[#141414] border border-red-500/40 px-6 py-4 shadow-2xl flex items-center gap-3 max-w-sm animate-fadeInUp">
        <div class="w-2 h-2 rounded-full bg-red-400 animate-pulse flex-shrink-0"></div>
        <p class="text-sm text-[#f7e080]">{{ session('error') }}</p>
        <button onclick="this.parentElement.remove()" class="ml-auto text-red-400/50 hover:text-red-400">✕</button>
    </div>
    @endif

    <script>
        // Mobile menu toggle
        const btn = document.getElementById('mobileMenuBtn');
        const menu = document.getElementById('mobileMenu');
        const menuIcon = document.getElementById('menuIcon');
        const closeIcon = document.getElementById('closeIcon');

        btn?.addEventListener('click', () => {
            menu.classList.toggle('hidden');
            menuIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
        });

        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.style.boxShadow = '0 4px 30px rgba(0,0,0,0.8)';
            } else {
                navbar.style.boxShadow = 'none';
            }
        });

        // Auto-dismiss flash message
        const flash = document.getElementById('flashMsg');
        const flashErr = document.getElementById('flashMsgErr');
        if (flash) setTimeout(() => flash.remove(), 4000);
        if (flashErr) setTimeout(() => flashErr.remove(), 5000);
    </script>
    @yield('scripts')
</body>
</html>
