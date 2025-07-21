<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('classroom.data', [
            'classroom' => Classroom::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('classroom.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required'
        ]);
        Classroom::create($validation);

        $message = [
            'message' => 'Berhasil menambah data kelas!',
            'type-message' => 'success',
        ];

        return redirect()->route('classroom.index')->with($message);
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
        return view('classroom.form-edit', [
            'classroom' => Classroom::find($id)
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
        Classroom::find($id)->update($validation);

        $message = [
            'message' => 'Berhasil mengubah data kelas!',
            'type-message' => 'success',
        ];

        return redirect()->route('classroom.index')->with($message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Classroom::find($id)->delete();

        $message = [
            'message' => 'Berhasil menghapus data kelas!',
            'type-message' => 'info',
        ];

        return redirect()->route('classroom.index');
    }
}
