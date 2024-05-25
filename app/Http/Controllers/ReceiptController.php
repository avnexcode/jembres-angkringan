<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu;
use App\Models\Nota;
use App\Models\Receipt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use RealRashid\SweetAlert\Facades\Alert;


class ReceiptController extends Controller
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
            'items.*.menu_id' => ['required', 'string', 'max:255'],
            'items.*.total_pesanan' => ['required', 'integer', 'min:1'],
        ]);

        $receipts = [];
        $user_id = Auth::id();

        foreach ($validatedData['items'] as $item) {
            $menu = Menu::findOrFail($item['menu_id']);

            $cart = Cart::where('user_id', $user_id)
                ->where('menu_id', $item['menu_id'])
                ->first();

            if ($request->route()->getName() == 'receipt.store') {
                $menu->stock -= $item['total_pesanan'];
                $menu->save();
            } elseif ($cart) {
                $menu->stock -= $item['total_pesanan'];
                $menu->save();
            }

            $receipts[] = [
                'user_id' => $user_id,
                'menu_id' => $item['menu_id'],
                'total_pesanan' => $item['total_pesanan'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
            Cart::updateOrCreate(
                [
                    'user_id' => $user_id,
                    'menu_id' => $item['menu_id'],
                ],
                [
                    'total_pesanan' => $item['total_pesanan'],
                ]
            );
        }

        Alert::success('Berhasil Membeli', "Lanjutkan Pembelian Lebih Banyak Lagi");

        Receipt::insert($receipts);
        Nota::insert([
            "user_id" => $user_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Cart::where('user_id', $user_id)->delete();

        return redirect(route('page.home'))->with('buy-success', "Berhasil Melakukan Pembelian");
    }

    /**
     * Display the specified resource.
     */
    public function show(Receipt $receipt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Receipt $receipt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Receipt $receipt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

        $receipt = Receipt::findOrFail($request->receipt_id);
        $receipt->delete();

        return redirect(route('dashboard'))->with('succes_delete_receipt', "Berhasil Menghapus Data");
    }

    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
