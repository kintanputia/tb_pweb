<?php

namespace App\Http\Controllers;
use App\Models\Kelas;
use App\Models\Krs;
use App\Models\User;
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
        $dt = User::where('name', '!=', 'Admin')->whereNotIn('id', Krs::where('kelas_id', '=', $kelas->id)->pluck('mahasiswa_id'))->get();
        // $kelas = Krs::where('kelas_id', $kelas->id)->first();
    
        return view('kelas.tambah_peserta', compact('kelas', 'dt'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Krs::create([
            'kelas_id' => $request->kelas_id,
            'mahasiswa_id' => $request->mahasiswa_id
        ]);

        return redirect()->action([KelasController::class, 'show'], ['kelas' => $request->kelas_id])->with('status', 'Data Berhasil Ditambah');;

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
    public function destroy($id)
    {
        // Krs::destroy($krs->krs_id);
        // Krs::where('krs_id', $id)->delete();
        $idkls = Krs::where('krs_id', $id)->first(['kelas_id']);
        // return redirect()->action([KelasController::class, 'show'], ['kelas' => $idkls->kelas_id]);
        return redirect('dkelas/'.$idkls->kelas_id);
    }
}
