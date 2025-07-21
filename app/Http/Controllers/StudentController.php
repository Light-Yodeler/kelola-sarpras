<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('student.data', [
            'student' => Student::with('classroom')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.form', [
            'classroom' => Classroom::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'classroom_id' => 'required',
            'name'         => 'required'
        ]);

        Student::create($validation);

        $message = [
            'message' => 'Berhasil manambah data siswa!',
            'type-message' => 'success',
        ];

        return redirect()->route('student.index')->with($message);
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
    public function edit(string $id) {
        return view('student.form-edit', [
            'student' => Student::find($id),
            'classroom' => Classroom::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = $request->validate([
            'classroom_id' => 'required',
            'name'         => 'required'
        ]);

        Student::find($id)->update($validation);

        $message = [
            'message' => 'Berhasil mengubah data siswa!',
            'type-message' => 'success',
        ];

        return redirect()->route('student.index')->with($message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Student::find($id)->delete();

        $message = [
            'message' => 'Berhasil menghapus data siswa!',
            'type-message' => 'info',
        ];
        
        return redirect()->route('student.index')->with($message);
    }
}
