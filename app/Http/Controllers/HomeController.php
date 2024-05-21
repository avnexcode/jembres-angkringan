<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        // $cart = Auth::user()->cart;
        return view('pages.home', [
            "title" => "Home",
            "menus" => Menu::all(),
            "cart" => Cart::where('user_id', Auth::id())->get(),
            // "cart2" => $cart
        ]);
    }
}
