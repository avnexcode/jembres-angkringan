<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Nota Penjualan') }}
                </h2>
            </div>
            <div class="">
                <a href="/dashboard/note" class="btn btn-neutral text-white">Cetak Penjualan</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto w-full">
                        <table class="table w-full text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Customer</th>
                                    <th>Nama Makanan</th>
                                    <th>Jumlah</th>
                                    <th>Harga Makanan</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($receipts) > 0)
                                    @foreach ($receipts as $key => $receipt)
                                        <tr>
                                            <th>{{ $key + 1 }}</th>
                                            <td>{{ $receipt->user->name }}</td>
                                            <td>{{ $receipt->menu->name }}</td>
                                            <td>{{ $receipt->total_pesanan }}</td>
                                            <td>Rp {{ number_format($receipt->menu->price, 0, ',', '.') }}</td>
                                            <td>Rp
                                                {{ number_format($receipt->menu->price * $receipt->total_pesanan, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">
                                            <div class="flex justify-center w-full">
                                                <div role="alert" class="alert alert-info max-w-2xl">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                        </path>
                                                    </svg>
                                                    <span>Belum Ada Data</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
