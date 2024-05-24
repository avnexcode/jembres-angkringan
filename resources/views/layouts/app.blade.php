<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js"
        integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <style>
        .container {
            display: grid;
            grid-template-columns: auto;
            gap: 0px;
            width: 100%;
        }

        hr {
            height: 1px;
            background-color: rgba(16, 86, 82, .75);
            border: none;
        }

        .card {
            width: 100%;
        }

        .title {
            width: 100%;
            height: 40px;
            position: relative;
            display: flex;
            align-items: center;
            padding-left: 20px;
            border-bottom: 1px solid rgba(16, 86, 82, .75);
            ;
            font-weight: 700;
            font-size: 11px;
            color: #000000;
        }

        .cart {
            border-radius: 19px 19px 0px 0px;
        }

        .cart .steps {
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        .cart .steps .step {
            display: grid;
            gap: 10px;
        }

        .cart .steps .step span {
            font-size: 13px;
            font-weight: 600;
            color: #000000;
            margin-bottom: 8px;
            display: block;
        }

        .cart .steps .step p {
            font-size: 13px;
            font-weight: 600;
            color: #000000;
        }

        /* Checkout */
        .payments .details {
            display: grid;
            grid-template-columns: 10fr 2fr;
            padding: 0px;
            gap: 5px;
        }

        .payments .details span:nth-child(odd) {
            font-size: 12px;
            font-weight: 600;
            color: #000000;
            margin: auto auto auto 0;
        }

        .payments .details span:nth-child(even) {
            font-size: 13px;
            font-weight: 600;
            color: #000000;
            margin: auto 0 auto auto;
        }

        .checkout .footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 10px 10px 20px;
            background-color: white;
        }

        .price {
            position: relative;
            font-size: 22px;
            color: #2B2B2F;
            font-weight: 900;
        }

        .checkout .checkout-btn {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            width: 150px;
            height: 36px;
            background: white;
            box-shadow: 0px 0.5px 0.5px black, 0px 1px 0.5px black;
            border-radius: 7px;
            border: 1px solid black;
            color: #000000;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.3s cubic-bezier(0.15, 0.83, 0.66, 1);
        }

        
    </style>
</head>

<body class="font-sans antialiased">

    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')
        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @include('sweetalert::alert')

</body>

</html>
