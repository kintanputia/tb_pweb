<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data_krs = DB::table('krs')
        //             -> join ('kelas', 'krs.kelas_id', '=', 'kelas.id')
        //             -> select ('kode_kelas', 'nama_matkul', 'tahun', 'semester')
        //             -> where ('mahasiswa_id','=','1')
        //             -> orderBy ('tahun', 'desc')
        //             -> orderBy ('semester', 'desc')
        //             -> get();
        $data_krs = DB::table('kelas')->get();
        return view('kelas.index', ['data_krs' => $data_krs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show(Kelas $kelas)
    {
        $krs = Krs::where('kelas_id', $kelas->id)->get();
        $sPertemuan = Pertemuan::where('kelas_id', $kelas->id)->get();
        return view('kelas.detail_kelas', compact('kelas', 'krs', 'sPertemuan'));
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
