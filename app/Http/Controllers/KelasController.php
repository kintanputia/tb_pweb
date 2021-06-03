<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Krs;
use App\Models\Pertemuan;
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
        if (auth()->user()->level=='admin'){
            $data_krs = DB::table('kelas')
                        -> orderBy ('tahun', 'desc')
                        -> orderBy ('semester', 'desc')
                        ->get();
        }else {
            $data_krs = DB::table('krs')
                        -> join ('kelas', 'krs.kelas_id', '=', 'kelas.id')
                        -> select ('kode_kelas', 'nama_matkul', 'tahun', 'semester','id')
                        -> where ('mahasiswa_id','=', auth()->user()->id)
                        -> orderBy ('nama_matkul', 'asc')
                        -> get();
        }
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
        return view('kelas.tambahkelas');
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

        Kelas::create([
            'kode_kelas' => $request->kode_kelas,
            'kode_matkul' => $request->kode_matkul,
            'nama_matkul' => $request->nama_matkul,
            'tahun' => $request->tahun,
            'semester' => $request->semester,
            'sks' => $request->sks,
        ]);

        return redirect('/kelas')->with('status', 'Data Kelas Berhasil Ditambah!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        if (auth()->user()->level=='admin'){
            $peserta = DB::table('krs')
                    ->join('users', 'users.id', '=', 'krs.mahasiswa_id')
                    ->where('kelas_id', $kelas->id)
                    ->get();
            // $k = Krs::where('kelas_id', $kelas->id)->first();
            $sPertemuan = Pertemuan::where('kelas_id', $kelas->id)->get();
            $i = 1;
            $n = 1;
            return view('kelas.detail_kelas', compact('kelas', 'peserta', 'sPertemuan', 'i', 'n'));

        }
        else{
            $kehadiran = 'Tidak Hadir';
            $krs = DB::table('krs')
                    //->join ('users', 'krs.mahasiswa_id', '=', 'users.id')
                    ->join ('absensi', 'krs.krs_id', '=', 'absensi.krs_id')
                    ->select ('absensi.pertemuan_id', 'absensi.krs_id')
                    ->where ('krs.mahasiswa_id', '=', auth()->user()->id)
                    ->where ('krs.kelas_id', '=', $kelas->id)
                    ->get();
            $sPertemuan = DB::table('pertemuan')
                        //  ->join ('absensi', 'absensi.pertemuan_id','=', 'pertemuan.pertemuan_id')
                        //  ->join ('kelas', 'pertemuan.kelas_id', '=', 'kelas.id')
                        // ->join ('pertemuan', function ($join) {
                        //     $join->on('absensi.pertemuan_id','=', 'pertemuan.pertemuan_id')
                        //          ->where('pertemuan.kelas_id', '=', $kelas->id);
                        //         })
                        ->select ('pertemuan_ke','pertemuan_id')
                        ->where ('pertemuan.kelas_id', '=', $kelas->id)
                        ->get();
                        // foreach ($krs as $absen){
                        //     foreach ($sPertemuan as $prt){
                        //         if ($absen->pertemuan_id == $prt->pertemuan_id){
                        //         $kehadiran [] = 'Hadir';
                        //         }else{
                        //         $kehadiran [] = 'Tidak Hadir';
                        //         }
                        //     }
                        // }
                        // $panjang1 = count($krs);
                        // $panjang2 = count($sPertemuan);
                        // for ($i=0 ; $i<$panjang1 ; ++$i){
                        //     for ($j=0 ; $j<$panjang2 ; ++$j){
                        //         if ($krs[$i]=$sPertemuan[$j]){
                        //             $kehadiran[$j] = 'Hadir';
                        //         }else {
                        //             $kehadiran[$j] = 'Tidak Hadir';
                        //         }
                        //     }
                        // }
            return view('kelas.detail_kelas', compact('kelas', 'krs', 'sPertemuan', 'kehadiran'));
            }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kelas)
    {
        //
        //Kelas::where('id',$kelas)->get();
        return view('kelas.ubahkelas', compact('kelas'));
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
        $request->validate([
            'kode_kelas' => 'required',
            'kode_matkul' => 'required',
            'nama_matkul' => 'required',
            'tahun' => 'required',
            'semester' => 'required',
            'sks' => 'required'
        ]);

        Kelas::where('id', $id)
            ->update([
            'kode_kelas' => $request->kode_kelas,
            'kode_matkul' => $request->kode_matkul,
            'nama_matkul' => $request->nama_matkul,
            'tahun' => $request->tahun,
            'semester' => $request->semester,
            'sks' => $request->sks
            ]);
            return redirect('/kelas')->with('status', 'Data Berhasil Diubah');
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
