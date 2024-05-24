<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrintNoteController extends Controller
{
    public function index(Request $request)
    {
        $note = Nota::findOrFail($request->id);
        return view("pages.print.print", [
            "title" => "Print",
            "data" => $note
        ]);
    }
}