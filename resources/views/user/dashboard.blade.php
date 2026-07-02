@extends('layouts.app')
@section('title', 'Dashboard Saya - Khazanah Cake & Bakery')
@section('content')
<div class="pt-24 pb-12 px-6">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl font-bold text-[#d4af37] mb-8" style="font-family:'Cormorant Garamond',serif;">Dashboard Saya</h2>
        
        <div class="bg-[#141414] border border-[#d4af37]/15 rounded-2xl p-6 mb-8">
            <h3 class="text-xl text-[#f7e080] mb-4">Halo, {{ Auth::user()->name }}!</h3>
            <p class="text-sm text-[#f7e080]/60">Di sini Anda dapat melihat riwayat pesanan dan status pembayaran Anda.</p>
        </div>

        <div class="bg-[#141414] border border-[#d4af37]/15 rounded-2xl overflow-hidden">
            <div class="px-6 py-4 border-b border-[#d4af37]/10">
                <h3 class="text-lg font-semibold text-[#d4af37]" style="font-family:'Cormorant Garamond',serif;">Riwayat Pesanan</h3>
            </div>
            
            @if($orders->count() === 0)
                <div class="p-8 text-center text-[#f7e080]/40 text-sm">
                    Belum ada pesanan. <a href="{{ url('/#produk') }}" class="text-[#d4af37] hover:underline">Mulai belanja sekarang!</a>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-[#0e0e0e] border-b border-[#d4af37]/10">
                                <th class="text-left px-6 py-4 text-xs tracking-widest uppercase text-[#d4af37]/60 font-medium">Order ID</th>
                                <th class="text-left px-6 py-4 text-xs tracking-widest uppercase text-[#d4af37]/60 font-medium">Produk</th>
                                <th class="text-left px-6 py-4 text-xs tracking-widest uppercase text-[#d4af37]/60 font-medium">Total</th>
                                <th class="text-left px-6 py-4 text-xs tracking-widest uppercase text-[#d4af37]/60 font-medium">Status Pesanan</th>
                                <th class="text-left px-6 py-4 text-xs tracking-widest uppercase text-[#d4af37]/60 font-medium">Status Pembayaran</th>
                                <th class="text-left px-6 py-4 text-xs tracking-widest uppercase text-[#d4af37]/60 font-medium">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#d4af37]/5">
                            @foreach($orders as $order)
                            <tr class="hover:bg-[#d4af37]/5 transition-colors">
                                <td class="px-6 py-4 font-mono text-[#f7e080]/60">#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</td>
                                <td class="px-6 py-4">
                                    <div class="font-medium text-[#f7e080]">{{ $order->product?->name }}</div>
                                    <div class="text-xs text-[#f7e080]/40">Qty: {{ $order->quantity }}</div>
                                </td>
                                <td class="px-6 py-4 text-[#d4af37] font-semibold">{{ $order->formatted_total }}</td>
                                <td class="px-6 py-4">
                                    <span class="badge-status badge-{{ $order->status }}">{{ $order->status_label }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="badge-status badge-{{ $order->payment_status }}">
                                        @if($order->payment_method === 'cod')
                                            COD
                                        @else
                                            {{ $order->payment_status_label }}
                                        @endif
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    @if($order->payment_method === 'transfer' && $order->payment_status === 'unpaid')
                                        <a href="{{ route('user.payment', $order) }}" class="btn-outline-gold text-[10px] px-3 py-1">Upload Bukti</a>
                                    @else
                                        <span class="text-xs text-[#f7e080]/30">-</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="p-4 border-t border-[#d4af37]/10">
                    {{ $orders->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
