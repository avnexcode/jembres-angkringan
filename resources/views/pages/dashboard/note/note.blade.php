<x-app-layout>
    <style>
        @medie print {
            #button-print {
                display: none;
            }
        }
    </style>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Cetak Nota') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-12" id="main-note-content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto w-full">
                        <table class="table w-full text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Customer</th>
                                    <th>Jumlah Pesanan</th>
                                    <th>Total Pembayaran</th>
                                    <th>Cetak</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $notaUserIds = [];
                                    $notaUserCreatedAt = [];
                                @endphp
                                @if (count($notas) > 0)
                                    @foreach ($notas as $key => $nota)
                                        @php
                                            $jumlahPesanan = 0;
                                            $totalPembayaran = 0;
                                            $userExists = false;
                                        @endphp
                                        @foreach ($nota->user->receipt as $receipt)
                                            @php
                                                $jumlahPesanan += $receipt->total_pesanan;
                                                $totalPembayaran += $receipt->total_pesanan * $receipt->menu->price;
                                            @endphp
                                            @if (!in_array($receipt->created_at, $notaUserCreatedAt))
                                                @php
                                                    $notaUserCreatedAt[] = $receipt->created_at;
                                                @endphp
                                            @endif
                                        @endforeach
                                        @if (!in_array($nota->user->id, $notaUserIds))
                                            @php
                                                $notaUserIds[] = $nota->user->id;
                                            @endphp
                                            <tr>
                                                <th>{{ $key + 1 }}</th>
                                                <td>{{ $nota->user->name }}</td>
                                                <td>{{ $jumlahPesanan }}</td>
                                                <td>Rp {{ number_format($totalPembayaran, 0, ',', '.') }}</td>
                                                <td>
                                                    <button class="btn btn-sm"
                                                        onclick="my_modal_{{ $nota->id }}.showModal()"><i
                                                            class="fa-solid fa-print"></i></button>
                                                </td>
                                            </tr>
                                            {{-- todo - Print Area --}}
                                            <div class="" id="printableArea">
                                                <dialog id="my_modal_{{ $nota->id }}"
                                                    class="modal modal-bottom sm:modal-middle">
                                                    <div class="modal-box">
                                                        <div class="container">
                                                            <div class="card cart">
                                                                <label class="title">Nota</label>
                                                                <div class="steps">
                                                                    <div class="step">
                                                                        <div>
                                                                            <span>Penerima :
                                                                                {{ $nota->user->name }}</span>
                                                                            <p>AJK (Angkringan Jembres Kanigoro)</p>
                                                                            <p>📍Kantor Kabupaten(KanKab) Kanigoro.
                                                                                Depan Patung Bungkarno Pas, Utara jalan.
                                                                            </p>
                                                                        </div>
                                                                        <hr>
                                                                        <div>
                                                                            <span>Metode Pembayaran :</span>
                                                                            <p>Bayar di Tempat</p>
                                                                        </div>
                                                                        <hr>
                                                                        <hr>
                                                                        <div class="payments">
                                                                            <span>List Pembayaran :</span>
                                                                            <div class="details">
                                                                                @foreach ($nota->user->receipt as $receipt)
                                                                                    <span>{{ $receipt->menu->name }}</span>
                                                                                    <span>{{ $receipt->menu->price }} x
                                                                                        {{ $receipt->total_pesanan }}</span>
                                                                                @endforeach
                                                                                <span
                                                                                    class="font-semibold">Subtotal</span>
                                                                                <span
                                                                                    class="font-semibold">{{ number_format($totalPembayaran, 0, ',', '.') }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="card checkout">
                                                                <div class="footer">
                                                                    <label class="price">Rp
                                                                        {{ number_format($totalPembayaran, 0, ',', '.') }}</label>
                                                                    <button class="checkout-btn print:hidden"
                                                                        id="button-print">Cetak</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-action print:hidden">
                                                            <form method="dialog">
                                                                <button class="btn">Close</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </dialog>
                                            </div>
                                            {{-- todo - End Print Area --}}
                                        @endif
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
    <script>
        $('#button-print').on('click', () => {
            printFunction("printableArea");
        });

        const printFunction = (divId) => {
            const $printContents = $(`#${divId}`).html();
            const $originalContents = $('body').html();

            $('body').html($printContents);
            window.print();
            $('body').html($originalContents);
        };
    </script>
</x-app-layout>
