<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Items Ordered') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <h5 class="text-xl font-bold">{{ $username }}s Items Ordered Details</h5>
                    <p>
                        <strong>ID:</strong> {{ $itemsOrder->id_items_ordered }}<br>
                        <strong>ID_Appointment:</strong> {{ $itemsOrder->appointment_id }}<br>
                        <strong>ID_Sparepart:</strong> {{ $itemsOrder->sparepart_id }}<br>
                        <strong>Amount:</strong> {{ $itemsOrder->amount }}<br>
                    </p>
                    <div class="flex justify-start">
                        <a href="{{ route('admin.appointment.index') }}" class="btn btn-black mb-2" style="padding: 12px 20px; background-color: #000; color: #fff; text-decoration: none; border-radius: 8px; font-weight: 600; transition: background-color 0.3s ease;">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
