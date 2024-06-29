<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Appointment List') }}
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
                        <a href="{{ route('admin.appointment.create') }}" class="btn btn-black mb-2" style="padding: 12px 20px; background-color: #000; color: #fff; text-decoration: none; border-radius: 8px; font-weight: 600; transition: background-color 0.3s ease;">Add Appointment</a>
                    </div>

                    <div class="mb-18">
                        <table class="table-auto w-full mb-6 mt-6"> 
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border px-4 py-2">ID</th>
                                    <th class="border px-4 py-2">ID Item Order</th>
                                    <th class="border px-4 py-2">ID User</th>
                                    <th class="border px-4 py-2">Day</th>
                                    <th class="border px-4 py-2">Status</th>
                                    <th class="border px-4 py-2">Action</th>
                            </thead>
                            <tbody>
                                @foreach ($appointments as $appointment)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $appointment->id_appointment }}</td>
                                        <td class="border px-4 py-2">{{ $appointment->ordered_id }}</td>
                                        <td class="border px-4 py-2">{{ $appointment->user_id }}</td>
                                        <td class="border px-4 py-2">{{ $appointment->day }}</td>
                                        <td class="border px-4 py-2">{{ $appointment->status }}</td>
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('admin.appointment.edit', $appointment->id_appointment) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('admin.appointment.view', $appointment->id_appointment) }}" class="btn btn-info">View</a>
                                            <form action="{{ route('admin.appointment.destroy', $appointment->id_appointment) }}" method="POST" style="display: inline-block;">
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
