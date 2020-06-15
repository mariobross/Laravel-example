<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = Teacher::paginate(10);
        return view('teacher.index', compact('teacher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama' => 'required',
            'nik' => 'required|size:9',
            'email' => 'required|email:rfc,dns',
            'alamat' => 'required'
        ]);

        // cara insert

        //cara pertama
        // $teacher = new Teacher;
        // $teacher->nama = $request->nama;
        // $teacher->nik = $request->nik;
        // $teacher->email = $request->email;
        // $teacher->alamat = $request->alamat;

        // $teacher->save();

        // cara kedua
        // Teacher::create([
        //     'nama' => $request->nama,
        //     'nik' => $request->nik,
        //     'email' => $request->email,
        //     'alamat' => $request->alamat
        // ]);

        //cara ketiga jika sudah menambahkan fillable di model
        Teacher::create($request->all());

        return redirect('/dosen')->with('berhasil', 'Data Berhasil disimpan!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
        return view('teacher.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view('teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        Teacher::where('id', $teacher->id)
            ->update([
                'nama' => $request->nama,
                'nik' => $request->nik,
                'email' => $request->email,
                'alamat' => $request->alamat
            ]);

        return redirect('/dosen')->with('berhasil', 'Data Berhasil diubah!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        Teacher::destroy($teacher->id);
        return redirect('/dosen')->with('berhasil', 'Data Berhasil dihapus!!!');
    }
}
