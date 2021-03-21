<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\student;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Student::all();
        return view('mahasiswa/index', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        Student::create($request->all());
        return redirect('/mahasiswa')->with('sukses', 'Data berhasil diinput');
        //return $request->all();
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $mahasiswa = Student::find($id);
        return view('mahasiswa/edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $mahasiswa = Student::find($id);
        $mahasiswa->update($request->all());
        return redirect('/mahasiswa')->with('sukses', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
        $mahasiswa = Student::find($id);
        $mahasiswa->delete($mahasiswa);
        return redirect('/mahasiswa')->with('sukses', 'Data berhasil dihapus!');
    }

    public function frekuensi()
    {
        $nilaiMax = Student::max('nilai');
        $nilaiMin = Student::min('nilai');
        $avg = number_format(Student::average('nilai'), 2);
        $mahasiswa = Student::all();

        $frq = Student::select('nilai', DB::raw('count(*) as frq'))
            ->groupBy('nilai')
            ->get();
        $totalskor = Student::sum('nilai');
        $totalfrekuensi = Student::count('nilai');

        return view('/frekuensi', [
            'mahasiswa' => $mahasiswa,
            'max' => $nilaiMax,
            'min' => $nilaiMin,
            'avg' => $avg,
            'frq' => $frq,
            'totalskor' => $totalskor,
            'totalfrekuensi' => $totalfrekuensi
        ]);
    }
/*
    public function operations()
    {
        // return DB::table('students')->avg('nilai');
        // return DB::table('students')->min('nilai');
        // return DB::table('students')->max('nilai');
        $mahasiswa = Student::all();
        $frq = Student::select('nilai', DB::raw('count(*) as frekuensi'))
            ->groupBy('nilai')
            ->get();
        $totalskor = Student::sum('nilai');
        $totalfrekuensi = Student::count('nilai');

        return view('/frekuensi', [
            'mahasiswa' => $mahasiswa,
            'frq' => $frq,
            'totalskor' => $totalskor,
            'totalfrekuensi' => $totalfrekuensi
        ]);
    }
*/
}
