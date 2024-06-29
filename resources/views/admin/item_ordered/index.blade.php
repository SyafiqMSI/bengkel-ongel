<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Items Ordered List') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="mt-10 mb-10 text-2xl">
                        <a href="{{ route('admin.item_ordered.create') }}" class="btn btn-black mb-2" style="padding: 12px 20px; background-color: #000; color: #fff; text-decoration: none; border-radius: 8px; font-weight: 600; transition: background-color 0.3s ease;">Add Appointment</a>
                    </div>

                    <div class="mb-18">
                        <table class="table-auto w-full mb-6 mt-6"> 
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border px-4 py-2">ID</th>
                                    <th class="border px-4 py-2">ID Appointment</th>
                                    <th class="border px-4 py-2">ID Sparepart</th>
                                    <th class="border px-4 py-2">Amount</th>
                            </thead>
                            <tbody>
                                @foreach ($itemsorder as $itemsOrder)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $itemsOrder->id_items_ordered }}</td>
                                        <td class="border px-4 py-2">{{ $itemsOrder->appointment_id }}</td>
                                        <td class="border px-4 py-2">{{ $itemsOrder->sparepart_id }}</td>
                                        <td class="border px-4 py-2">{{ $itemsOrder->Amount }}</td>
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('admin.item_ordered.edit', $itemsOrder->id_items_ordered) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('admin.item_ordered.view', $itemsOrder->id_items_ordered) }}" class="btn btn-info">View</a>
                                            <form action="{{ route('admin.item_ordered.destroy', $itemsOrder->id_items_ordered) }}" method="POST" style="display: inline-block;">
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
