<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Spare Parts List') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="mb-18">
                        <table class="table-auto w-full mb-6"> 
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border px-4 py-2">ID</th>
                                    <th class="border px-4 py-2">Name</th>
                                    <th class="border px-4 py-2">Image</th>
                                    <th class="border px-4 py-2">Description</th>
                                    <th class="border px-4 py-2">Price</th>
                                    <th class="border px-4 py-2">Stock</th>
                                    <th class="border px-4 py-2">Date Added</th>
                                    <th class="border px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($spareParts as $sparePart)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $sparePart->id_spare_part }}</td>
                                        <td class="border px-4 py-2">{{ $sparePart->nama_spare_part }}</td>
                                        <td class="border px-4 py-2">
                                            @if ($sparePart->gambar)
                                                <img src="{{ asset('storage/spare_parts/' . $sparePart->gambar) }}" alt="Spare Part Image" class="max-w-xs">
                                            @else
                                                No image available
                                            @endif
                                        </td>
                                        <td class="border px-4 py-2">{{ $sparePart->deskripsi }}</td>
                                        <td class="border px-4 py-2">{{ $sparePart->harga }}</td>
                                        <td class="border px-4 py-2">{{ $sparePart->stock_spare_part }}</td>
                                        <td class="border px-4 py-2">{{ $sparePart->tanggal_masuk }}</td>
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('admin.spare_parts.edit', $sparePart->id_spare_part) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('admin.spare_parts.view', $sparePart->id_spare_part) }}" class="btn btn-info">View</a>
                                            <form action="{{ route('admin.spare_parts.destroy', $sparePart->id_spare_part) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this spare part?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-10 text-2xl">
                        <a href="{{ route('admin.spare_parts.create') }}" class="btn btn-black mb-2" style="padding: 12px 20px; background-color: #000; color: #fff; text-decoration: none; border-radius: 8px; font-weight: 600; transition: background-color 0.3s ease;">Add New Spare Part</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
