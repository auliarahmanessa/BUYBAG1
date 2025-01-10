<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function showPaymentForm($productId)
    {
        // Data produk bisa diambil dari database
        $products = [
            1 => ['name' => 'Sheena bag', 'price' => 500000],
            2 => ['name' => 'Pistachio bag', 'price' => 450000],
            3 => ['name' => 'Sling bag', 'price' => 400000],
        ];

        $product = $products[$productId] ?? null;

        if (!$product) {
            return redirect('/')->with('error', 'Produk tidak ditemukan.');
        }

        return view('payment', compact('product'));
    }

    // Memproses pembayaran
    public function processPayment(Request $request)
    {
        // Validasi input
        $request->validate([
            'product_name' => 'required|string',
            'price' => 'required|numeric',
            'customer_name' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        // Proses pembayaran (contoh: simpan ke database, integrasi API, dll.)
        // Simpan data pembayaran atau lanjutkan ke sistem pembayaran

        return redirect('/')->with('success', 'Pembayaran berhasil diproses!');
    }
}
