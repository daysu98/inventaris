<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Storage;
use Str;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'items' => Item::all(),
        ];

        return view('apps.items.items', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'suppliers'  => Supplier::all(),
            'formMethod' => 'POST',
            'formAction' => route('items.store'),
            'pageTitle'  => 'Tambah Data Barang',
        ];

        return view('apps.items.item-form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'photo'       => ['required', 'image'],
            'name'        => ['required'],
            'supplier_id' => ['required', 'numeric'],
            'description' => ['required'],
            'stock'       => ['required', 'numeric'],
            'price'       => ['required', 'numeric'],
        ]);

        $credentials['user_id'] = auth()->user()->id;
        $credentials['slug']    = Str::slug($credentials['name']);
        $getItemBySlug          = Item::where('slug', $credentials['slug'])->get();
        if (count($getItemBySlug) > 0) {
            $credentials['slug'] = $credentials['slug'] . '-' . count($getItemBySlug);
        }

        $credentials['photo'] = Storage::disk('public')->put('product-photos', $credentials['photo']);

        Item::create($credentials);

        return redirect('/items')->with('message', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $data = [
            'item'       => $item,
            'suppliers'  => Supplier::all(),
            'formMethod' => 'PATCH',
            'formAction' => route('items.update', ['item' => $item->id]),
            'pageTitle'  => 'Tambah Data Barang',
        ];

        return view('apps.items.item-form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $credentials = $request->validate([
            'photo'       => ['image'],
            'name'        => ['required'],
            'supplier_id' => ['required', 'numeric'],
            'description' => ['required'],
            'stock'       => ['required', 'numeric'],
            'price'       => ['required', 'numeric'],
        ]);

        $credentials['slug'] = Str::slug($credentials['name']);

        if (@$credentials['photo'] != null) {
            Storage::disk('public')->delete($item->photo);
            $credentials['photo'] = Storage::disk('public')->put('product-photos', $credentials['photo']);
        }

        $item->update($credentials);

        return redirect('/items')->with('message', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        Storage::disk('public')->delete($item->photo);
        $item->delete();
        return redirect('/items')->with('message', 'Data Berhasil Dihapus');
    }

    /**
     * Publish status.
     */
    public function publish(Item $item)
    {
        $item->update(['publish' => ($item->publish ? 0 : 1)]);

        return redirect('/items')->with('message', 'Status berhasil diubah');
    }
}
