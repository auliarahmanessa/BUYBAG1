<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h1>Halaman Pembayaran</h1>
    <form action="{{ route('payment.submit') }}" method="POST">
        @csrf
        <div>
            <label>Produk:</label>
            <input type="text" name="product_name" value="{{ $product['name'] }}" readonly>
        </div>
        <div>
            <label>Harga:</label>
            <input type="text" name="price" value="{{ $product['price'] }}" readonly>
        </div>
        <div>
            <label>Nama Pelanggan:</label>
            <input type="text" name="customer_name" required>
        </div>
        <div>
            <label>Metode Pembayaran:</label>
            <select name="payment_method" required>
                <option value="credit_card">Kartu Kredit</option>
                <option value="bank_transfer">Transfer Bank</option>
                <option value="e-wallet">E-Wallet</option>
            </select>
        </div>
        <button type="submit">Bayar Sekarang</button>
    </form>
</body>
</html>
