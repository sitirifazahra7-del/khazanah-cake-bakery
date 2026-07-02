<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard — Khazanah Cake & Bakery</title>
    <meta name="description" content="Admin dashboard for managing Khazanah Cake & Bakery orders.">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#0a0a0a] text-[#f7e080] min-h-screen font-[Inter,sans-serif]" style="font-family:'Inter',sans-serif;">

<!-- Wrapper -->
<div class="flex min-h-screen">

    <!-- ============================
         SIDEBAR
         ============================ -->
    <aside id="sidebar" class="fixed top-0 left-0 h-full w-64 bg-[#080808] border-r border-[#d4af37]/10 z-40 flex flex-col overflow-y-auto transition-transform duration-300 -translate-x-full lg:translate-x-0">
        <!-- Logo -->
        <div class="p-6 border-b border-[#d4af37]/10">
            <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 border border-[#d4af37] flex items-center justify-center">
                    <span class="text-[#d4af37] font-bold text-lg" style="font-family:'Cormorant Garamond',serif;">K</span>
                </div>
                <div>
                    <div class="text-[#d4af37] font-bold" style="font-family:'Cormorant Garamond',serif;">Khazanah</div>
                    <div class="text-[9px] tracking-[0.3em] uppercase opacity-50">Admin Panel</div>
                </div>
            </a>
        </div>

        <!-- Nav Items -->
        <nav class="flex-1 p-4">
            <div class="mb-2">
                <p class="text-[9px] tracking-widest uppercase text-[#f7e080]/30 px-3 mb-2">Menu</p>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-3 text-sm text-[#d4af37] bg-[#d4af37]/10 border-l-2 border-[#d4af37] transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 7h18M3 12h18M3 17h18"/></svg>
                    Daftar Pesanan
                </a>
            </div>
            <div class="mb-2 mt-4">
                <p class="text-[9px] tracking-widest uppercase text-[#f7e080]/30 px-3 mb-2">Navigasi</p>
                <a href="{{ url('/') }}" class="flex items-center gap-3 px-3 py-3 text-sm text-[#f7e080]/60 hover:text-[#d4af37] hover:bg-[#d4af37]/5 transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/></svg>
                    Lihat Website
                </a>
            </div>
        </nav>
            <div class="mb-2 mt-4">
                <p class="text-[9px] tracking-widest uppercase text-[#f7e080]/30 px-3 mb-2">Account</p>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="flex items-center gap-3 px-3 py-3 text-sm text-[#f7e080]/60 hover:text-[#d4f37] hover:bg-[#d4af37]/5 transition-all duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 11-4 0v-1"/></svg>
                        Logout
                    </button>
                </form>
            </div>

        <!-- Bottom info -->
        <div class="p-4 border-t border-[#d4af37]/10">
            <p class="text-xs text-[#f7e080]/25 text-center">© {{ date('Y') }} Khazanah Bakery</p>
        </div>
    </aside>

    <!-- Sidebar Overlay (mobile) -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black/60 z-30 lg:hidden hidden" onclick="toggleSidebar()"></div>

    <!-- ============================
         MAIN CONTENT
         ============================ -->
    <div class="flex-1 lg:ml-64 flex flex-col min-h-screen">

        <!-- Top Navbar -->
        <header class="sticky top-0 z-20 bg-[#0a0a0a]/90 backdrop-blur-md border-b border-[#d4af37]/10 px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <!-- Mobile sidebar toggle -->
                <button id="sidebarToggle" onclick="toggleSidebar()" class="lg:hidden text-[#d4af37] p-1">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
                <div>
                    <h1 class="text-lg font-bold text-[#d4af37]" style="font-family:'Cormorant Garamond',serif;">Dashboard Admin</h1>
                    <p class="text-xs text-[#f7e080]/40">Kelola semua pesanan pelanggan</p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <span class="text-xs text-[#f7e080]/40 hidden md:block">{{ now()->isoFormat('dddd, D MMMM Y') }}</span>
                <a href="{{ url('/') }}" class="btn-outline-gold text-xs px-4 py-2">← Website</a>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-1 p-6">

            <!-- Flash Messages -->
            @if(session('success'))
            <div class="mb-6 bg-[#141414] border border-[#4ade80]/30 px-6 py-4 flex items-center gap-3 animate-fadeInUp">
                <div class="w-2 h-2 rounded-full bg-[#4ade80]"></div>
                <p class="text-sm text-[#f7e080]">{{ session('success') }}</p>
                <button onclick="this.parentElement.remove()" class="ml-auto text-[#f7e080]/30 hover:text-[#f7e080]">✕</button>
            </div>
            @endif

            <!-- ============================
                 STATS CARDS
                 ============================ -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 mb-8">
                <!-- Total Orders -->
                <div class="bg-[#141414] border border-[#d4af37]/15 p-5 hover:border-[#d4af37]/40 transition-colors duration-300 col-span-2 md:col-span-1">
                    <div class="flex items-start justify-between mb-3">
                        <p class="text-xs tracking-widest uppercase text-[#f7e080]/40">Total Pesanan</p>
                        <span class="text-lg">📋</span>
                    </div>
                    <p class="text-3xl font-bold text-[#d4af37]" style="font-family:'Cormorant Garamond',serif;">{{ $stats['total'] }}</p>
                </div>
                <!-- Pending -->
                <div class="bg-[#141414] border border-[#fbbf24]/15 p-5 hover:border-[#fbbf24]/40 transition-colors duration-300">
                    <div class="flex items-start justify-between mb-3">
                        <p class="text-xs tracking-widest uppercase text-[#f7e080]/40">Menunggu</p>
                        <span class="text-lg">⏳</span>
                    </div>
                    <p class="text-3xl font-bold text-[#fbbf24]" style="font-family:'Cormorant Garamond',serif;">{{ $stats['pending'] }}</p>
                </div>
                <!-- Processing -->
                <div class="bg-[#141414] border border-[#60a5fa]/15 p-5 hover:border-[#60a5fa]/40 transition-colors duration-300">
                    <div class="flex items-start justify-between mb-3">
                        <p class="text-xs tracking-widest uppercase text-[#f7e080]/40">Diproses</p>
                        <span class="text-lg">⚙️</span>
                    </div>
                    <p class="text-3xl font-bold text-[#60a5fa]" style="font-family:'Cormorant Garamond',serif;">{{ $stats['processing'] }}</p>
                </div>
                <!-- Completed -->
                <div class="bg-[#141414] border border-[#4ade80]/15 p-5 hover:border-[#4ade80]/40 transition-colors duration-300">
                    <div class="flex items-start justify-between mb-3">
                        <p class="text-xs tracking-widest uppercase text-[#f7e080]/40">Selesai</p>
                        <span class="text-lg">✅</span>
                    </div>
                    <p class="text-3xl font-bold text-[#4ade80]" style="font-family:'Cormorant Garamond',serif;">{{ $stats['completed'] }}</p>
                </div>
                <!-- Revenue -->
                <div class="bg-gradient-to-br from-[#d4af37]/15 to-[#141414] border border-[#d4af37]/30 p-5 col-span-2 md:col-span-1">
                    <div class="flex items-start justify-between mb-3">
                        <p class="text-xs tracking-widest uppercase text-[#f7e080]/40">Total Revenue</p>
                        <span class="text-lg">💰</span>
                    </div>
                    <p class="text-2xl font-bold text-[#d4af37]" style="font-family:'Cormorant Garamond',serif;">
                        Rp {{ number_format($stats['revenue'], 0, ',', '.') }}
                    </p>
                </div>
            </div>

            <!-- ============================
                 FILTER & SEARCH
                 ============================ -->
            <div class="bg-[#141414] border border-[#d4af37]/15 p-5 mb-6">
                <form action="{{ route('admin.dashboard') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1 relative">
                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Cari nama pelanggan, telepon, atau produk..."
                            class="input-gold pl-10 w-full"
                        >
                        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-[#d4af37]/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <select name="status" class="input-gold md:w-48 cursor-pointer">
                        <option value="">Semua Status</option>
                        <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>⏳ Menunggu</option>
                        <option value="processing" {{ request('status') === 'processing' ? 'selected' : '' }}>⚙️ Diproses</option>
                        <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>✅ Selesai</option>
                        <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>❌ Dibatalkan</option>
                    </select>
                    <button type="submit" class="btn-gold px-6 py-3 text-xs">
                        <span>Filter</span>
                    </button>
                    @if(request('search') || request('status'))
                    <a href="{{ route('admin.dashboard') }}" class="btn-outline-gold px-5 py-3 text-xs">Reset</a>
                    @endif
                </form>
            </div>

            <!-- ============================
                 ORDERS TABLE
                 ============================ -->
            <div class="bg-[#141414] border border-[#d4af37]/15 overflow-hidden">
                <!-- Table Header -->
                <div class="px-6 py-4 border-b border-[#d4af37]/10 flex items-center justify-between">
                    <h2 class="text-base font-semibold text-[#d4af37]" style="font-family:'Cormorant Garamond',serif;">
                        Daftar Pesanan
                        <span class="text-sm font-normal text-[#f7e080]/40 ml-2">({{ $orders->total() }} total)</span>
                    </h2>
                </div>

                @if($orders->count() === 0)
                <!-- Empty State -->
                <div class="py-20 text-center">
                    <div class="text-5xl mb-4">📭</div>
                    <p class="text-[#f7e080]/40 text-sm">Belum ada pesanan yang masuk.</p>
                    <a href="{{ url('/') }}" class="btn-outline-gold text-xs px-6 py-2 mt-4 inline-flex">Lihat Website</a>
                </div>
                @else
                <!-- Scrollable Table -->
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-[#0e0e0e] border-b border-[#d4af37]/10">
                                <th class="text-left px-6 py-4 text-xs tracking-widest uppercase text-[#d4af37]/60 font-medium">#</th>
                                <th class="text-left px-6 py-4 text-xs tracking-widest uppercase text-[#d4af37]/60 font-medium">Pelanggan</th>
                                <th class="text-left px-6 py-4 text-xs tracking-widest uppercase text-[#d4af37]/60 font-medium">Produk</th>
                                <th class="px-6 py-4 text-left text-xs tracking-widest font-medium text-[#d4af37]/60 uppercase border-b border-[#d4af37]/10">Total</th>
                                <th class="px-6 py-4 text-left text-xs tracking-widest font-medium text-[#d4af37]/60 uppercase border-b border-[#d4af37]/10">Status</th>
                                <th class="px-6 py-4 text-left text-xs tracking-widest font-medium text-[#d4af37]/60 uppercase border-b border-[#d4af37]/10">Pembayaran</th>
                                <th class="px-6 py-4 text-left text-xs tracking-widest font-medium text-[#d4af37]/60 uppercase border-b border-[#d4af37]/10">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#d4af37]/5">
                            @foreach($orders as $order)
                            <tr class="hover:bg-[#d4af37]/3 transition-colors duration-150 group" id="order-row-{{ $order->id }}">
                                <td class="px-6 py-4 text-[#f7e080]/40 font-mono text-xs">#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</td>
                                <td class="px-6 py-4">
                                    <div class="font-medium text-[#f7e080]">{{ $order->customer_name }}</div>
                                    <div class="text-xs text-[#f7e080]/40">{{ $order->customer_phone }}</div>
                                    <div class="text-xs text-[#f7e080]/60 mt-1">📍 {{ $order->customer_address }}</div>
                                    @if($order->notes)
                                    <div class="text-xs text-[#d4af37]/50 mt-1 italic max-w-xs truncate" title="{{ $order->notes }}">
                                        📝 {{ $order->notes }}
                                    </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-[#f7e080]/80">{{ $order->product?->name ?? '-' }}</td>
                                <td class="px-6 py-4 text-[#d4af37] font-semibold" style="font-family:'Cormorant Garamond',serif;">
                                    {{ $order->formatted_total }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="badge-status badge-{{ $order->status }}">{{ $order->status_label }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-col gap-1 items-start">
                                        <span class="badge-status badge-{{ $order->payment_status }}">
                                            @if($order->payment_method === 'cod')
                                                COD
                                            @else
                                                {{ $order->payment_status_label }}
                                            @endif
                                        </span>
                                        @if($order->payment_proof)
                                            <a href="{{ Storage::url($order->payment_proof) }}" target="_blank" class="text-[10px] text-blue-400 hover:underline">Lihat Bukti</a>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 space-y-2">
                                    <!-- Status Update Dropdown -->
                                    <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST" class="flex items-center gap-1">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" onchange="this.form.submit()"
                                                class="text-xs bg-[#0a0a0a] border border-[#d4af37]/20 text-[#f7e080] px-2 py-1 cursor-pointer hover:border-[#d4af37]/50 transition-colors outline-none appearance-none pr-6"
                                                style="background-image: url('data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 20 20%22 fill=%22%23d4af37%22><path fill-rule=%22evenodd%22 d=%22M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z%22 clip-rule=%22evenodd%22/></svg>'); background-repeat: no-repeat; background-position: right 0.3rem center; background-size: 1rem;">
                                            <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>⏳ Menunggu</option>
                                            <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>⚙️ Proses</option>
                                            <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>✅ Selesai</option>
                                            <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>❌ Batal</option>
                                        </select>
                                    </form>

                                    <!-- Verifikasi Pembayaran -->
                                    @if($order->payment_method === 'transfer' && $order->payment_status === 'pending_verification')
                                    <form action="{{ route('admin.orders.verifyPayment', $order) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn-outline-gold text-[10px] px-2 py-1 w-full text-center">Verifikasi Bayar</button>
                                    </form>
                                    @endif

                                    <!-- Delete Button -->
                                    <form action="{{ route('admin.orders.destroy', $order) }}" method="POST"
                                            onsubmit="return confirm('Yakin hapus pesanan #{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="w-8 h-8 flex items-center justify-center border border-red-500/20 text-red-400/50 hover:border-red-500/60 hover:text-red-400 hover:bg-red-500/10 transition-all duration-200 text-xs"
                                                title="Hapus pesanan">
                                            🗑
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($orders->hasPages())
                <div class="px-6 py-4 border-t border-[#d4af37]/10 flex items-center justify-between">
                    <p class="text-xs text-[#f7e080]/40">
                        Menampilkan {{ $orders->firstItem() }}–{{ $orders->lastItem() }} dari {{ $orders->total() }} pesanan
                    </p>
                    <div class="flex items-center gap-1">
                        @if($orders->onFirstPage())
                            <span class="px-3 py-1 text-xs text-[#f7e080]/20 border border-[#d4af37]/10 cursor-not-allowed">←</span>
                        @else
                            <a href="{{ $orders->previousPageUrl() }}" class="px-3 py-1 text-xs text-[#d4af37] border border-[#d4af37]/30 hover:bg-[#d4af37]/10 transition-colors">←</a>
                        @endif

                        @foreach($orders->getUrlRange(1, $orders->lastPage()) as $page => $url)
                            @if($page === $orders->currentPage())
                                <span class="px-3 py-1 text-xs bg-[#d4af37] text-[#0a0a0a] font-bold">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="px-3 py-1 text-xs text-[#d4af37] border border-[#d4af37]/30 hover:bg-[#d4af37]/10 transition-colors">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if($orders->hasMorePages())
                            <a href="{{ $orders->nextPageUrl() }}" class="px-3 py-1 text-xs text-[#d4af37] border border-[#d4af37]/30 hover:bg-[#d4af37]/10 transition-colors">→</a>
                        @else
                            <span class="px-3 py-1 text-xs text-[#f7e080]/20 border border-[#d4af37]/10 cursor-not-allowed">→</span>
                        @endif
                    </div>
                </div>
                @endif
                @endif
            </div>

        </main>
    </div>
</div>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        sidebar.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
    }
</script>

</body>
</html>
