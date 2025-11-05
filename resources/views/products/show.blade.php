<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h3 class="mb-4">Detail Produk</h3>
    <div class="card p-4">
        <p><strong>Nama:</strong> {{ $product->nama }}</p>
        <p><strong>Harga:</strong> {{ $product->harga }}</p>
        <p><strong>Stok:</strong> {{ number_format($product->stok, 0, ',', '.') }}</p>
    </div>
    <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
</body>
</html>
