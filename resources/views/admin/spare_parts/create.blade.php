<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Spare Part') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.spare_parts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="id_spare_part" class="block text-gray-700 text-sm font-bold mb-2">ID</label>
                            <input type="text" id="id_spare_part" name="id_spare_part" value="{{ old('id_spare_part') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('id_spare_part')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="nama_spare_part" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                            <input type="text" id="nama_spare_part" name="nama_spare_part" value="{{ old('nama_spare_part') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('nama_spare_part')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="gambar" class="block text-gray-700 text-sm font-bold mb-2">Image</label>
                            <input type="file" id="gambar" name="gambar" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('gambar')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="deskripsi" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                            <textarea id="deskripsi" name="deskripsi" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="harga" class="block text-gray-700 text-sm font-bold mb-2">Price</label>
                            <input type="text" id="harga" name="harga" value="{{ old('harga') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('harga')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="stock_spare_part" class="block text-gray-700 text-sm font-bold mb-2">Stock</label>
                            <input type="text" id="stock_spare_part" name="stock_spare_part" value="{{ old('stock_spare_part') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('stock_spare_part')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="tanggal_masuk" class="block text-gray-700 text-sm font-bold mb-2">Date Added</label>
                            <input type="date" id="tanggal_masuk" name="tanggal_masuk" value="{{ old('tanggal_masuk') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('tanggal_masuk')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-black mb-2" style="padding: 12px 20px; background-color: #000; color: #fff; text-decoration: none; border-radius: 8px; font-weight: 600; transition: background-color 0.3s ease;">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
