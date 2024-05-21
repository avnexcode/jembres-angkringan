<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Hasil Bulanan') }}
                </h2>
            </div>
            <div class="">
                <a href="/dashboard/" class="btn btn-neutral text-white">Cetak Penjualan</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Nota</h1>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
