<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="text-lg font-semibold">📦 Data Produk</h5>
                    @if(auth()->user()->role == 'admin')
                        <a href="{{ route('products.create') }}" 
                           class="btn btn-primary btn-sm">
                           + Tambah Produk
                        </a>
                    @endif
                </div>

                @if($products->isEmpty())
                    <p class="text-center text-muted">Tidak ada data produk.</p>
                @else
                    <table class="table table-bordered table-hover">
                        <thead class="bg-gray-100">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $index => $product)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>
                                        <a href="{{ route('products.show', $product->id) }}" 
                                           class="btn btn-info btn-sm">👁️</a>

                                        @if(auth()->user()->role == 'admin')
                                            <a href="{{ route('products.edit', $product->id) }}" 
                                               class="btn btn-warning btn-sm">✏️</a>

                                            <form action="{{ route('products.destroy', $product->id) }}" 
                                                  method="POST" 
                                                  class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" 
                                                        onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                                    🗑️
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
