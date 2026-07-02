<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name'    => 'required|string|max:255',
            'customer_phone'   => 'required|string|max:20',
            'customer_address' => 'required|string',
            'product_id'       => 'required|exists:products,id',
            'quantity'         => 'required|integer|min:1|max:100',
            'notes'            => 'nullable|string|max:500',
            'payment_method'   => 'required|in:transfer,cod',
        ], [
            'customer_name.required'    => 'Nama pelanggan wajib diisi.',
            'customer_phone.required'   => 'Nomor telepon wajib diisi.',
            'customer_address.required' => 'Alamat pengiriman wajib diisi.',
            'product_id.required'       => 'Produk harus dipilih.',
            'product_id.exists'         => 'Produk tidak ditemukan.',
            'quantity.required'         => 'Jumlah pesanan wajib diisi.',
            'quantity.min'              => 'Jumlah pesanan minimal 1.',
            'payment_method.required'   => 'Metode pembayaran harus dipilih.',
        ]);

        $product = Product::findOrFail($validated['product_id']);
        $totalPrice = $product->price * $validated['quantity'];

        $order = Order::create([
            'user_id'          => auth()->id(),
            'customer_name'    => $validated['customer_name'],
            'customer_phone'   => $validated['customer_phone'],
            'customer_address' => $validated['customer_address'],
            'product_id'       => $validated['product_id'],
            'quantity'         => $validated['quantity'],
            'total_price'      => $totalPrice,
            'notes'            => $validated['notes'] ?? null,
            'payment_method'   => $validated['payment_method'],
            'payment_status'   => $validated['payment_method'] === 'transfer' ? 'unpaid' : 'pending_verification',
            'status'           => 'pending',
        ]);

        if (auth()->check()) {
            if ($validated['payment_method'] === 'transfer') {
                return redirect()->route('user.payment', $order)->with('success', 'Pesanan dibuat! Silakan upload bukti pembayaran.');
            }
            return redirect()->route('user.dashboard')->with('success', 'Pesanan COD berhasil dibuat!');
        }

        return redirect()->route('home')->with('success', '🎉 Pesanan Anda berhasil dikirim! Kami akan menghubungi Anda segera.');
    }
}
