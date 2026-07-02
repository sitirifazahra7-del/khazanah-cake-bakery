<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        $query = Order::with('product');

        // Search
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('customer_name', 'like', "%{$search}%")
                  ->orWhere('customer_phone', 'like', "%{$search}%")
                  ->orWhereHas('product', fn($pq) => $pq->where('name', 'like', "%{$search}%"));
            });
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        $orders = $query->latest()->paginate(10)->withQueryString();

        // Stats
        $stats = [
            'total'        => Order::count(),
            'pending'      => Order::where('status', 'pending')->count(),
            'processing'   => Order::where('status', 'processing')->count(),
            'completed'    => Order::where('status', 'completed')->count(),
            'cancelled'    => Order::where('status', 'cancelled')->count(),
            'revenue'      => Order::where('status', 'completed')->sum('total_price'),
        ];

        return view('admin.dashboard', compact('orders', 'stats'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled',
        ]);

        $order->update(['status' => $request->input('status')]);

        return back()->with('success', 'Status pesanan berhasil diperbarui.');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return back()->with('success', 'Pesanan berhasil dihapus.');
    }

    public function verifyPayment(Order $order)
    {
        $order->update([
            'payment_status' => 'verified',
            'status'         => 'processing', // Auto move to processing once paid
        ]);
        
        return back()->with('success', 'Pembayaran berhasil diverifikasi.');
    }
}
