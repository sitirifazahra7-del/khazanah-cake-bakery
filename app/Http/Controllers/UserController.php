<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $orders = $user->orders()->with('product')->latest()->paginate(10);
        return view('user.dashboard', compact('orders'));
    }

    public function showPayment(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }
        if ($order->payment_method === 'cod') {
            return redirect()->route('user.dashboard')->with('success', 'Pesanan COD tidak perlu upload bukti transfer.');
        }

        return view('orders.payment', compact('order'));
    }

    public function uploadPayment(Request $request, Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'payment_proof' => 'required|image|max:2048',
        ]);

        if ($request->hasFile('payment_proof')) {
            $path = $request->file('payment_proof')->store('payments', 'public');
            $order->update([
                'payment_proof'  => $path,
                'payment_status' => 'pending_verification',
            ]);
        }

        return redirect()->route('user.dashboard')->with('success', 'Bukti pembayaran berhasil diupload! Menunggu verifikasi admin.');
    }
}
