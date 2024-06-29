<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cart') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl mb-4">Your Cart</h2>
                    <table class="table-auto w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border px-4 py-2">ID</th>
                                <th class="border px-4 py-2">Spare Part</th>
                                <th class="border px-4 py-2">Quantity</th>
                                <th class="border px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $cart)
                                <tr>
                                    <td class="border px-4 py-2 text-center align-middle">{{ $cart->id }}</td>
                                    <td class="border px-4 py-2">{{ $cart->sparePart->nama_spare_part }}</td>
                                    <td class="border px-4 py-2 text-center align-middle">{{ $cart->quantity }}</td>
                                    <td class="border px-4 py-2">
                                        <div class="flex justify-center space-x-1">
                                            <form action="{{ route('cart.update', $cart->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" name="action" value="decrease"
                                                    class="text-gray-600 focus:outline-none focus:text-gray-900 px-2 py-1 text-md">
                                                    Decrease
                                                </button>
                                            </form>
                                            <form action="{{ route('cart.update', $cart->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" name="action" value="increase"
                                                    class="text-gray-600 focus:outline-none focus:text-gray-900 px-2 py-1 text-md">
                                                    Increase
                                                </button>
                                            </form>
                                            <form action="{{ route('cart.destroy', $cart->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger px-2 py-1 text-md">Remove</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
