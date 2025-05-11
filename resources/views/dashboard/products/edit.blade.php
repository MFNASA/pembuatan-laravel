<x-layouts.app :title="'edit'">
<div class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow text-black">
<h2 class="text-2xl font-bold mb-4">Edit Produk</h2>

{{-- Tampilkan error validasi --}}
@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 p-3 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li class="text-black">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')

    {{-- Nama --}}
    <div class="mb-4">
        <label class="block font-medium mb-1 text-black">Nama Produk</label>
        <input type="text" name="name" class="w-full border px-3 py-2 rounded text-black"
                value="{{ old('name', $product->name) }}" required>
    </div>

    {{-- Deskripsi --}}
    <div class="mb-4">
        <label class="block font-medium mb-1 text-black">Deskripsi</label>
        <textarea name="description" class="w-full border px-3 py-2 rounded text-black" rows="4">{{ old('description', $product->description) }}</textarea>
    </div>

    {{-- Harga --}}
    <div class="mb-4">
        <label class="block font-medium mb-1 text-black">Harga (Rp)</label>
        <input type="number" name="price" class="w-full border px-3 py-2 rounded text-black"
                value="{{ old('price', $product->price) }}" required>
    </div>

    {{-- URL Gambar --}}
    <div class="mb-4">
        <label class="block font-medium mb-1 text-black">URL Gambar</label>
        <input type="url" name="image_url" class="w-full border px-3 py-2 rounded text-black"
                value="{{ old('image_url', $product->image_url) }}">
    </div>

    {{-- Preview Gambar --}}
    @if ($product->image_url)
        <div class="mb-4">
            <label class="block font-medium mb-1 text-black">Preview Gambar:</label>
            <img src="{{ $product->image_url }}" alt="Preview Gambar"
                    class="w-32 h-32 object-cover rounded border">
        </div>
    @endif

    {{-- Tombol --}}
    <div class="flex justify-end">
        <a href="{{ route('products.index') }}" class="mr-3 text-gray-600 hover:underline">← Batal</a>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Simpan Perubahan
        </button>
    </div>
</form>
</div>
</x-layouts.app>
