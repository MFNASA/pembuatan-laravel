<x-layouts.app :title="'Tambah Kategori'">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Tambah Kategori</h1>

        <form action="{{ route('categories.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block font-medium">Nama Kategori</label>
                <input type="text" name="name" id="name" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
</x-layouts.app>
