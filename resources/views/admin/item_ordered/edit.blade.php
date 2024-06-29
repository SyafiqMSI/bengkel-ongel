<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Appointment') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.item_ordered.update', $itemsOrder->id_items_ordered) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mb-4">
                            <label for="id_items_ordered" class="block text-gray-700 text-sm font-bold mb-2">ID</label>
                            <input type="text" id="id_items_ordered" name="id_items_ordered" value="{{ $itemsOrder->id_items_ordered }}" readonly class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="appointment_id" class="block text-gray-700 text-sm font-bold mb-2">Appointment ID</label>
                            <input type="text" id="appointment_id" name="appointment_id" value="{{ $itemsOrder->appointment_id }}" readonly class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="sparepart_id" class="block text-gray-700 text-sm font-bold mb-2">Sparepart ID</label>
                            <input type="text" id="sparepart_id" name="sparepart_id" value="{{ $itemsOrder->sparepart_id }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="amount" class="block text-gray-700 text-sm font-bold mb-2">Amount</label>
                            <input type="date" id="amount" name="amount" value="{{ $itemsOrder->amount }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <button type="submit" class="btn btn-black mb-2" style="padding: 12px 20px; background-color: #000; color: #fff; text-decoration: none; border-radius: 8px; font-weight: 600; transition: background-color 0.3s ease;">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
