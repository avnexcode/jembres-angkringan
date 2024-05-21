<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Menu') }}
                </h2>
            </div>
            <div class="">
                <a href="{{ route('menu.create') }}" class="btn btn-neutral text-white">Buat Menu Baru</a>
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto w-full">
                        @if (Session::has('succes_delete_receipt'))
                            <div>
                                {{ session('succes_delete_receipt') }}
                            </div>
                        @endif
                        <table class="table w-full text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Menu</th>
                                    <th>Harga Menu</th>
                                    <th>Jumlah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menus as $key => $value)
                                    <tr>
                                        <th>{{ $key + 1 }}</th>
                                        <td>{{ $value->name }}</td>
                                        <td>Rp {{ number_format($value['price'], 0, ',', '.') }}</td>
                                        <td>{{ 'Unlimited' }}</td>
                                        <td class="flex gap-3 justify-center">
                                            <a href="{{route("menu.edit", $value->slug)}}" class="btn btn-sm btn-info text-white"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            <form action="{{ route('menu.destroy') }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <input type="hidden" name="menu_id" value="{{ $value['id'] }}">
                                                <button class="btn btn-sm btn-error text-white" id="delete" onclick="return confirm('Yakin Ingin Menghapus Data?')">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
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
    @include('sweetalert::alert')
</x-app-layout>
