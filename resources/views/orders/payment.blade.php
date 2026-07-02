@extends('layouts.app')
@section('title', 'Pembayaran - Khazanah Cake & Bakery')
@section('content')
<div class="pt-24 pb-12 px-6 min-h-screen flex items-center justify-center">
    <div class="max-w-2xl w-full">
        <div class="bg-[#141414] border border-[#d4af37]/20 rounded-3xl p-8 shadow-2xl relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-[#e4b820] via-[#d4af37] to-[#b8930e]"></div>
            
            <h2 class="text-3xl font-bold text-[#d4af37] mb-2 text-center" style="font-family:'Cormorant Garamond',serif;">Pembayaran Pesanan</h2>
            <p class="text-center text-sm text-[#f7e080]/60 mb-8">Order #{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</p>

            <div class="bg-[#0e0e0e] rounded-xl p-6 mb-8 border border-[#d4af37]/10 flex flex-col md:flex-row justify-between items-center gap-4">
                <div>
                    <p class="text-xs tracking-widest uppercase text-[#f7e080]/40 mb-1">Total Tagihan</p>
                    <p class="text-3xl font-bold text-[#d4af37]" style="font-family:'Cormorant Garamond',serif;">{{ $order->formatted_total }}</p>
                </div>
                <div class="text-right">
                    <p class="text-xs tracking-widest uppercase text-[#f7e080]/40 mb-1">Status Pembayaran</p>
                    <span class="badge-status badge-{{ $order->payment_status }} text-sm px-4 py-1">{{ $order->payment_status_label }}</span>
                </div>
            </div>

            <div class="mb-8">
                <h3 class="text-lg font-semibold text-[#f7e080] mb-4">Instruksi Transfer</h3>
                <div class="space-y-4">
                    <div class="p-4 border border-[#d4af37]/30 rounded-xl bg-[rgba(212,175,55,0.05)] flex items-center justify-between">
                        <div>
                            <p class="font-bold text-[#f7e080] text-lg">BCA</p>
                            <p class="text-[#d4af37] font-mono text-xl tracking-wider">123 456 7890</p>
                            <p class="text-xs text-[#f7e080]/60">a.n. Khazanah Bakery</p>
                        </div>
                        <div class="w-12 h-12 bg-white rounded-lg p-2 flex items-center justify-center">
                            <span class="text-blue-600 font-bold italic text-sm">BCA</span>
                        </div>
                    </div>
                </div>
            </div>

            <form action="{{ route('user.payment', $order) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-[#f7e080]/80 mb-2">Upload Bukti Transfer (JPG/PNG, max 2MB)</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-[#d4af37]/30 border-dashed rounded-xl hover:border-[#d4af37]/60 transition-colors bg-[#0a0a0a]">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-[#d4af37]/50" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-[#f7e080]/60 justify-center">
                                <label for="payment_proof" class="relative cursor-pointer bg-transparent rounded-md font-medium text-[#d4af37] hover:text-[#e4b820] focus-within:outline-none">
                                    <span>Pilih file</span>
                                    <input id="payment_proof" name="payment_proof" type="file" class="sr-only" accept="image/*" required>
                                </label>
                                <p class="pl-1">atau drag and drop</p>
                            </div>
                            <p class="text-xs text-[#f7e080]/40" id="fileName">Belum ada file dipilih</p>
                        </div>
                    </div>
                    @error('payment_proof')
                        <p class="text-red-400 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full btn-gold py-4 text-sm shadow-lg shadow-[#d4af37]/20">
                        <span>Konfirmasi Pembayaran</span>
                    </button>
                    <a href="{{ route('user.dashboard') }}" class="block text-center mt-4 text-sm text-[#f7e080]/50 hover:text-[#d4af37]">Kembali ke Dashboard</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('payment_proof').addEventListener('change', function(e) {
        const fileName = e.target.files[0]?.name || 'Belum ada file dipilih';
        document.getElementById('fileName').textContent = fileName;
        document.getElementById('fileName').classList.add('text-[#d4af37]');
    });
</script>
@endsection
