<x-layouts.app :title="'categories'">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4 text-black">Daftar Kategori</h1>
        <a href="{{ route('categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Kategori</a>

        <ul class="mt-4 space-y-2">
            @forelse ($categories as $category)
                <li class="p-2 border border-gray-300 rounded text-black">
                    {{ $category->name }}
                </li>
            @empty
                <li class="text-gray-500 italic">Belum ada kategori.</li>
            @endforelse
        </ul>
    </div>
</x-layouts.app>
