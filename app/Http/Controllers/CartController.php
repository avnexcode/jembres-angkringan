<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'menu_id' => ['required', 'string', 'max:255'],
        ]);

        $user_id = Auth::id();
        $menu_id = $validatedData['menu_id'];

        $existingCartItem = Cart::where('user_id', $user_id)
            ->where('menu_id', $menu_id)
            ->first();

        if ($existingCartItem) {
            $existingCartItem->total_pesanan += 1;
            $existingCartItem->save();
        } else {
            $validatedData['user_id'] = $user_id;
            $validatedData['total_pesanan'] = 1;
            Cart::create($validatedData);
        }
        Alert::success('Berhasil Menambahkan Ke Keranjang!', 'Silahkan Pilih Menu Lagi!');
        return redirect(route('page.home'));
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $cart = Cart::where('user_id', Auth::id())->get();
        return view('pages.cart',[
            "title" => "Cart",
            "cart" => $cart
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
