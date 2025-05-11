<x-layouts.app :title="'create'">
    <div class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow text-black">
        <h2 class="text-2xl font-bold mb-4">Tambah Produk</h2>

        {{-- Tampilkan error validasi --}}
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 p-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Nama --}}
            <div class="mb-4">
                <label class="block font-medium mb-1">Nama Produk</label>
                <input type="text" name="name" class="w-full border px-3 py-2 rounded text-black"
                        value="{{ old('name') }}" required>
            </div>

            {{-- Deskripsi --}}
            <div class="mb-4">
                <label class="block font-medium mb-1">Deskripsi</label>
                <textarea name="description" class="w-full border px-3 py-2 rounded text-black" rows="4">{{ old('description') }}</textarea>
            </div>

            {{-- Harga --}}
            <div class="mb-4">
                <label class="block font-medium mb-1">Harga (Rp)</label>
                <input type="number" name="price" class="w-full border px-3 py-2 rounded text-black"
                        value="{{ old('price') }}" required>
            </div>

            {{-- Stok --}}
            <div class="mb-4">
                <label class="block font-medium mb-1">Stok</label>
                <input type="number" name="stock" class="w-full border px-3 py-2 rounded text-black"
                        value="{{ old('stock') }}" required>
            </div>

            {{-- Status Aktif --}}
            <div class="mb-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="is_active" value="1" class="form-checkbox"
                            {{ old('is_active') ? 'checked' : '' }}>
                    <span class="ml-2">Aktif</span>
                </label>
            </div>

            {{-- Gambar --}}
            <div class="mb-4">
                <label for="image" class="block font-medium mb-1">Gambar Produk</label>
                <input type="file" name="image" id="image" accept="image/*"
                        class="w-full border px-3 py-2 rounded text-black">
                @error('image')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tombol --}}
            <div class="flex justify-end">
                <a href="{{ route('products.index') }}" class="mr-3 text-gray-600 hover:underline">← Batal</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded shadow">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>