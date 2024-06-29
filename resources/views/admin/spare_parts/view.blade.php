<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Spare Part') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <h5 class="text-xl font-bold">{{ $sparePart->nama_spare_part }}</h5>
                    <p>
                        <strong>ID:</strong> {{ $sparePart->id_spare_part }}<br>
                        <strong>Description:</strong> {{ $sparePart->deskripsi }}<br>
                        <strong>Price:</strong> {{ $sparePart->harga }}<br>
                        <strong>Stock:</strong> {{ $sparePart->stock_spare_part }}<br>
                        <strong>Date Added:</strong> {{ $sparePart->tanggal_masuk }}<br>
                        @if ($sparePart->gambar)
                            <img src="{{ asset('storage/spare_parts/' . $sparePart->gambar) }}" alt="Spare Part Image" class="max-w-xs">
                        @else
                            <div class="max-w-xs mb-4">No image available</div>
                        @endif
                    </p>
                    <div class="flex justify-start">
                        <a href="{{ route('admin.spare_parts.index') }}" class="btn btn-black mb-2" style="padding: 12px 20px; background-color: #000; color: #fff; text-decoration: none; border-radius: 8px; font-weight: 600; transition: background-color 0.3s ease;">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
