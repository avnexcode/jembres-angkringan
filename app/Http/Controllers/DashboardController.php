<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Receipt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() {
        return view('pages.dashboard.dashboard', [
            "title" => "Dashboard",
            "menus" => Menu::all()
        ]);
    }

    public function history() {

        return view('pages.dashboard.history.history', [
            "title" => "History",
            "receipts" => Receipt::all()
        ]);
    }

    public function note() {
        return view ("pages.dashboard.note.note", [
            "title" => "Nota Penjualan"
        ]);
    }
}
