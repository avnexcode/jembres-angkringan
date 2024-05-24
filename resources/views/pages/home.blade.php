<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Daisy UI CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.11.1/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Font Awesome CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- Tailwind Config --}}
    <script>
        tailwind.config = {
            theme: {
                fontFamily: {
                    'poppins': ['poppins', 'sans-serif']
                }
            }
        }
    </script>
    {{-- Google Font --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    </style>
</head>

<body class="font-poppins">
    @include('pages.components.navbar')
    @include('pages.components.hero')
    <main class="flex w-full justify-center flex-col items-center">
        <div class="mt-10">
            <h1 class="text-3xl my-10 border-b-2 border-r-2 border-black px-10 py-3 font-semibold">Menu Makanan</h1>
        </div>
        <div class="flex gap-5 overflow-x-auto w-full overflow-hidden px-2">
            @if (count($menus->where('category_id', 1)) > 0)
                @foreach ($menus->where('category_id', 1) as $key => $value)
                    <div class="card w-96 max-h-56 bg-base-100 shadow-xl image-full shrink-0">
                        <figure><img src="{{ asset('storage/' . $value->image) }}" class="object-cover w-full"
                                alt="{{ 'logo-' . $value->slug }}"></figure>
                        <div class="card-body">
                            <div class="card-title">
                                <h2 class="card-title text-2xl">{{ $value->name }}</h2>
                                <div class="badge badge-secondary">{{ $value->category->name }}</div>
                            </div>
                            <p class="text-xl">Rp {{ number_format($value->price, 0, ',', '.') }}</p>
                            <p class="text-xl">Tersisa <span class="badge font-semibold">{{ $value->stock }}</span> pcs</p>
                            @if ($value->stock <= 0)
                                <div class="card-actions justify-end">
                                    {{-- <button class="btn"><i class="fa-solid fa-cart-shopping"></i></button> --}}
                                    <button class="btn btn-ghost">Stock Habis</button>
                                </div>
                            @else
                                <div class="card-actions justify-end">
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="menu_id" id="menu_id"
                                            value="{{ $value->id }}">
                                        <button class="btn btn-accent text-lg text-slate-100" type="submit"><i
                                                class="fa-solid fa-cart-shopping"></i></button>
                                    </form>
                                    <form action="{{ route('receipt.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="items[0][menu_id]" value="{{ $value->id }}">
                                        <input type="hidden" name="items[0][total_pesanan]" value="1">
                                        <button class="btn" type="submit">Beli Menu</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <div class="flex justify-center w-full">
                    <div role="alert" class="alert alert-info max-w-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="stroke-current shrink-0 w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Belum Ada Menu Makanan Untuk Saat Ini</span>
                    </div>
                </div>
            @endif
        </div>
        <div class="mt-10">
            <h1 class="text-3xl my-10 border-b-2 border-l-2 border-black px-10 py-3 font-semibold">Menu Minuman</h1>
        </div>
        <div class="flex gap-5 overflow-x-auto w-full overflow-hidden px-2">
            @if (count($menus->where('category_id', 2)) > 0)
                @foreach ($menus->where('category_id', 2) as $key => $value)
                    <div class="card w-96 max-h-56 bg-base-100 shadow-xl image-full shrink-0">
                        <figure><img src="{{ asset('storage/' . $value->image) }}" class="object-cover w-full"
                                alt="{{ 'logo-' . $value->slug }}"></figure>
                        <div class="card-body">
                            <div class="card-title">
                                <h2 class="card-title text-2xl">{{ $value['name'] }}</h2>
                                <div class="badge badge-secondary">{{ $value->category->name }}</div>
                            </div>
                            <p class="text-xl">Rp {{ number_format($value->price, 0, ',', '.') }}</p>
                            <p class="text-xl">Tersisa <span class="badge font-semibold">{{ $value->stock }}</span> pcs
                            </p>
                            @if ($value->stock <= 0)
                                <div class="card-actions justify-end">
                                    {{-- <button class="btn"><i class="fa-solid fa-cart-shopping"></i></button> --}}
                                    <button class="btn btn-ghost">Stock Habis</button>
                                </div>
                            @else
                                <div class="card-actions justify-end">
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="menu_id" id="menu_id"
                                            value="{{ $value->id }}">
                                        <button class="btn btn-accent text-lg text-slate-100" type="submit"><i
                                                class="fa-solid fa-cart-shopping"></i></button>
                                    </form>
                                    <form action="{{ route('receipt.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="items[0][menu_id]" value="{{ $value->id }}">
                                        <input type="hidden" name="items[0][total_pesanan]" value="1">
                                        <button class="btn" type="submit">Beli Menu</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <div class="flex justify-center w-full">
                    <div role="alert" class="alert alert-info max-w-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="stroke-current shrink-0 w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Belum Ada Menu Minuman Untuk Saat Ini</span>
                    </div>
                </div>
            @endif
        </div>
    </main>
    @include('pages.components.footer')
    @include('sweetalert::alert')
</body>

</html>
