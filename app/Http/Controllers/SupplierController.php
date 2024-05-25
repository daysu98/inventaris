<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'suppliers' => Supplier::all(),
        ];

        return view('apps.suppliers.suppliers', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'formMethod' => 'POST',
            'formAction' => route('suppliers.store'),
            'pageTitle' => 'Tambah Data Supplier',
        ];

        return view('apps.suppliers.supplier-form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'phone' => ['required', 'numeric'],
            'address' => ['required'],
        ]);

        Supplier::create($credentials);

        return redirect('/suppliers')->with('message', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        $data = [
            'supplier' => $supplier,
            'formMethod' => 'PATCH',
            'formAction' => route('suppliers.update', ['supplier' => $supplier]),
            'pageTitle' => 'Edit Data Supplier',
        ];

        return view('apps.suppliers.supplier-form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'phone' => ['required', 'numeric'],
            'address' => ['required'],
        ]);
        
        $supplier->update($credentials);

        return redirect('/suppliers')->with('message', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect('/suppliers')->with('message', 'Data Berhasil Dihapus');
    }
}
