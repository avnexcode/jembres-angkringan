<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Cart') }}
                </h2>
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto px-4">
                        <h1 class="text-2xl font-semibold mb-4">Shopping Cart</h1>
                        <div class="flex flex-col md:flex-row gap-4">
                            <div class="md:w-3/4">
                                <div class="bg-white rounded-lg shadow-md p-6 mb-4">
                                    <table class="w-full">
                                        <thead>
                                            <tr>
                                                <th class="text-left font-semibold">Menu</th>
                                                <th class="text-left font-semibold">Harga</th>
                                                <th class="text-left font-semibold">Jumlah</th>
                                                <th class="text-left font-semibold">Total</th>
                                            </tr>
                                        </thead>
                                        @php
                                            $totalItems = 0;
                                            $totalPrice = 0;
                                        @endphp
                                        @foreach ($cart as $item)
                                            @php
                                                $totalItems += $item->total_pesanan;
                                                $totalPrice += $item->total_pesanan * $item->menu->price;
                                            @endphp
                                        @endforeach
                                        <tbody>
                                            @if (count($cart) > 0)
                                            @foreach ($cart as $key => $value)
                                                <tr>
                                                    <td class="py-4">
                                                        <div class="flex items-center">
                                                            <img class="h-16 w-16 mr-4"
                                                                src="{{ asset('storage/' . $value->menu->image) }}"
                                                                alt="{{ $value->menu->slug }}">
                                                            <span class="font-semibold">{{ $value->menu->name }}</span>
                                                        </div>
                                                    </td>
                                                    <td class="py-4">Rp
                                                        {{ number_format($value->menu->price, 0, ',', '.') }}</td>
                                                    <td class="py-4">
                                                        <div class="flex items-center">
                                                            <span
                                                                class="text-center w-8">{{ $value->total_pesanan }}</span>
                                                        </div>
                                                    </td>
                                                    <td class="py-4">Rp
                                                        {{ number_format($value->menu->price * $value['total_pesanan'], 0, ',', '.') }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td class="py-4 text-center pt-10" colspan="4">
                                                    Belum Ada Menu Dikeranjang
                                                </td>
                                            </tr>
                                            @endif
                                            <!-- More product rows -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="md:w-1/4">
                                <div class="bg-white rounded-lg shadow-md p-6">
                                    <h2 class="text-lg font-semibold mb-4">Payment</h2>
                                    <div class="flex justify-between mb-2">
                                        <span>Subtotal</span>
                                        <span>Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
                                    </div>
                                    <div class="flex justify-between mb-2">
                                        <span>Pajak</span>
                                        <span>Rp 0</span>
                                    </div>
                                    <div class="flex justify-between mb-2">
                                        <span>Ongkir</span>
                                        <span>Rp 0</span>
                                    </div>
                                    <hr class="my-2">
                                    <div class="flex justify-between mb-2">
                                        <span class="font-semibold">Total</span>
                                        <span class="font-semibold">Rp
                                            {{ number_format($totalPrice, 0, ',', '.') }}</span>
                                    </div>
                                    <form action="{{ route('receipt.store') }}" method="post">
                                        @csrf
                                        @foreach ($cart as $item)
                                            <input type="hidden" name="items[{{ $loop->index }}][menu_id]"
                                                value="{{ $item->menu_id }}">
                                            <input type="hidden" name="items[{{ $loop->index }}][total_pesanan]"
                                                value="{{ $item->total_pesanan }}">
                                        @endforeach
                                        <button class="bg-blue-500 text-white py-2 px-4 rounded-lg mt-4 w-full" type="submit">Checkout</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
