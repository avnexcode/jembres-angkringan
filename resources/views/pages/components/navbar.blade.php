<div class="navbar bg-base-100">
    <div class="flex-1">
        <a class="btn btn-ghost text-xl font-poppins">ANGKRINGAN JEMBRES</a>
    </div>
    <div class="flex-none">
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
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                <div class="indicator">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="badge badge-sm indicator-item">{{ $totalItems }}</span>
                </div>
            </div>
            <div tabindex="0" class="mt-3 z-[1] card card-compact dropdown-content w-52 bg-base-100 shadow">
                <div class="card-body">
                    <span class="font-bold text-lg">{{ $totalItems }} Items</span>
                    <span class="text-info">Subtotal: Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
                    <div class="card-actions flex justify-center">
                        <form action="{{ route('receipt.store') }}" method="post">
                            @csrf
                            @foreach ($cart as $item)
                                <input type="hidden" name="items[{{ $loop->index }}][menu_id]"
                                    value="{{ $item->menu_id }}">
                                <input type="hidden" name="items[{{ $loop->index }}][total_pesanan]"
                                    value="{{ $item->total_pesanan }}">
                            @endforeach
                            <a href="{{ route('cart.detail') }}" class="btn btn-primary btn-sm">Detail</a>
                            {{-- <button class="btn btn-primary" type="submit">Checkout</button> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full">
                    <img alt="Tailwind CSS Navbar component"
                        src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                </div>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                @auth
                    <li>
                        <a href="{{ route('profile.edit') }}" class="justify-between">Profile
                            <span class="badge badge-netural">{{ explode(' ', auth()->user()->name)[0] }}</span></a>
                    </li>
                    @if (auth()->user()->role === 'admin')
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    @endif
                    <li>
                        <form method="POST" action="{{ route('logout') }}" class="">
                            @csrf
                            <button type="submit" class="">Logout</button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('register') }}">Register</a></li>
                    <li><a href="{{ route('login') }}">Login</a></li>
                @endauth
            </ul>
        </div>
    </div>
</div>
