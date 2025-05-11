<x-layouts.app :title="('Products')">

<div class="p-6">
<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-3xl font-bold text-black">Products</h1>
        <p class="text-gray-500">Manage data Products</p>
    </div>
    <a href="{{ route('products.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
        Add New Product
    </a>
</div>

<div class="mb-4">
    <input type="text" placeholder="Search Products" class="w-full border rounded px-3 py-2" />
</div>

<div class="overflow-x-auto bg-white rounded shadow">
    <table class="min-w-full text-sm text-left table-fixed">
        <thead class="bg-gray-100 text-black">
            <tr>
                <th class="px-4 py-2 w-12">ID</th>
                <th class="px-4 py-2 w-32">Nama</th>
                <th class="px-4 py-2 w-32">Slug</th>
                <th class="px-4 py-2 w-48">Deskripsi</th>
                <th class="px-4 py-2 w-32">SKU</th>
                <th class="px-4 py-2 w-24">Harga</th>
                <th class="px-4 py-2 w-16">Stok</th>
                <th class="px-4 py-2 w-24">Gambar</th>
                <th class="px-4 py-2 w-32">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr class="border-t hover:bg-gray-50 align-top text-black">
                    <td class="px-4 py-2">{{ $product->id }}</td>
                    <td class="px-4 py-2 font-medium">{{ $product->name }}</td>
                    <td class="px-4 py-2 text-sm">{{ $product->slug ?? '-' }}</td>
                    <td class="px-4 py-2 text-sm">{{ $product->description ?? '-' }}</td>
                    <td class="px-4 py-2">{{ $product->sku ?? '-' }}</td>
                    <td class="px-4 py-2">Rp{{ number_format($product->price ?? 0, 0, ',', '.') }}</td>
                    <td class="px-4 py-2 text-center">{{ $product->stock ?? 0 }}</td>
                    <td class="px-4 py-2">
                        @if (!empty($product->image_url))
                            <img src="{{ $product->image_url }}" alt="Gambar Produk"
                                    class="w-16 h-16 object-cover rounded border border-gray-300 shadow-sm" />
                        @else
                            <span class="text-gray-400 italic">Tidak ada</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('products.edit', $product->id) }}"
                            class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                class="inline-block"
                                onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center text-gray-500 py-4">Belum ada produk.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</div>
</x-layouts.app>