<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $pagination = 10;

        $mahasiswa = User::where('level', 'mahasiswa')->paginate($pagination);

        return view('mahasiswa.index', compact('mahasiswa'));
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
    public function show(User $user)
    {
        return view('mahasiswa.detail_mahasiswa', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('mahasiswa.ubahmahasiswa', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'nim' => 'required'
        ]);

        User::where('id', $user->id)
            ->update([
                'name' => $request->name,
                'nim' => $request->nim
            ]);

        if($user)
        {
            return redirect('/mahasiswa')->with('status', 'Data Berhasil Diubah');
        }else {
            return redirect('/mahasiswa')->with('error', 'Data Gagal Diubah.');
        }
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);

        if($user)
        {
            return redirect('/mahasiswa')->with('status', 'Data Berhasil Dihapus');
        }else{
            return redirect('/mahasiswa')->with('status', 'Data Gagal Dihapus');
        }
        
    }
}
