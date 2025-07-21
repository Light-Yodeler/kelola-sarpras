<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\BorrowDetail;
use App\Models\Classroom;
use App\Models\Item;
use App\Models\Student;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Borrow::with('student', 'classroom', 'item', 'borrowDetail')->get();
        return view('borrow.data', [
            'borrow' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('borrow.form', [
            'student'   => Student::get(),
            'product'   => Item::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'student_id'   => 'required',
        ]);

        $validation['code'] = "SARPRAS" . '-' . date('ymd') . date('his');
        $validation['borrow_date'] = date('Y-m-d H:i:s');

        $borrow = Borrow::create($validation);

        foreach ($request->item_id as $item) {
            BorrowDetail::create([
                'borrow_id' => $borrow->id,
                'item_id' => $item,
            ]);

            $items = Item::find($item);
            $items->status = 'Dipinjam';
            $items->update();
        }

        $message = [
            'message' => 'Berhasil menambah data peminjaman!',
            'type-message' => 'success',
        ];

        return redirect()->route('borrow.index')->with($message);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function borrowStatus(Request $request, $id){
        $borrow = Borrow::find($id);

        $borrow->status = $request->input('status');
        $borrow->update();
        
        if ($borrow->status == 'Dikembalikan') {
            $borrow->return_date = date('Y-m-d H:i:s');
            $borrow->update();
        }

        $message = [
            'message' => 'Berhasil Dikembalikan!',
            'type-message' => 'info',
        ];

        return redirect()->route('borrow.index')->with($message);
    }
}
