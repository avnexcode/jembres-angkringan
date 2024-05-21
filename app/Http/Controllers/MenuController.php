<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Cviebrock\EloquentSluggable\Services\SlugService;

class MenuController extends Controller
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
        return view('pages.dashboard.menu.create', [
            "title" => "Create Menu"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required'],
            'price' => ['required'],
            'category_id' => ['required'],
            'image' => ['image', 'file', 'max:10000'],
        ]);

        if ($request->file('image')) {
            if ($validatedData["category_id"] === "1") {
                $validatedData['image'] = $request->file('image')->store('images/menus/makanan');
            } else {
                $validatedData['image'] = $request->file('image')->store('images/menus/minuman');
            }
        }

        $validatedData['slug'] = $this->generateSlug($validatedData['name']);

        Alert::success('Berhasil Menambahkan Menu Baru');
        Menu::create($validatedData);

        return redirect(route('dashboard'))->with('key', "");
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        return view('pages.dashboard.menu.edit', [
            "title" => "Edit Menu",
            "menu" => $menu,
            "categories" => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $validatedData = $request->validate([
            'name' => ['required'],
            'price' => ['required'],
            'category_id' => ['required'],
            'image' => ['image', 'file', 'max:10000'],
        ]);

        if ($request->file('image')) {
            if ($validatedData["category_id"] == "1") {
                $validatedData['image'] = $request->file('image')->store('images/menus/makanan');
            } else {
                $validatedData['image'] = $request->file('image')->store('images/menus/minuman');
            }
        } else {
            $validatedData['image'] = $menu->image;
        }

        $validatedData['slug'] = $this->generateSlug($validatedData['name']);
        
        Alert::success('Berhasil Memperbarui Menu');
        $menu->update($validatedData);

        return redirect(route('dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $receipt = Menu::findOrFail($request->menu_id);
        Alert::success('Berhasil Menghapus', "Maintain");
        $receipt->delete();
        return redirect(route("dashboard"));
    }

    protected function generateSlug(string $name): string
    {
        return strtolower(str_replace(' ', '-', $name));
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Menu::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
