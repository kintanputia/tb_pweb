<?php

namespace App\Http\Controllers;
use App\Models\Kelas;
use App\Models\Krs;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class KrsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_krs = DB::table('krss')
                        ->join ('kelass','krss.kelas_id', '=', 'kelass.kelas_id');
        return view('/kelas/index', ['data_krs' => $data_krs]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Kelas $kelas)
    {
        $dt = DB::table('krs')
                    ->join('users', 'users.id', '=', 'krs.mahasiswa_id')
                    ->where('kelas_id', '!=', $kelas->id)
                    ->get();

        return view('kelas.tambah_peserta')->with('data', $dt);
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
    public function destroy(Krs $krs)
    {
        Krs::destroy($krs->id);
        return redirect()->action([KelasController::class, 'show'], ['kelas' => $krs->kelas_id]);
    }
}
