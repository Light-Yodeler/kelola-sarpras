<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('item.data', [
            'item' => Item::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('item.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required'
        ]);

        Item::create($validation);
        $message = [
            'message' => 'Berhasil menambah data barang!',
            'type-message' => 'success',
        ];

        return redirect()->route('item.index')->with($message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('item.form-edit', [
            'item' => Item::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = $request->validate([
            'name' => 'required'
        ]);

        Item::find($id)->update($validation);

        $message = [
            'message' => 'Berhasil mengubah data barang!',
            'type-message' => 'success',
        ];

        return redirect()->route('item.index')->with($message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Item::find($id)->delete();

        $message = [
            'message' => 'Berhasil menghapus data barang!',
            'type-message' => 'info',
        ];

        return redirect()->route('item.index')->with($message);
    }
}
