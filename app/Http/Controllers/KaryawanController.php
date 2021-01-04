<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KaryawanController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_karyawan = \App\Models\karyawan::where('nama_depan','LIKE','%'.$request->cari.'%')->get();
        }else{
            $data_karyawan = \App\Models\karyawan::all();
        }

        return view('karyawan.index',['data_karyawan' => $data_karyawan]);
    }

    public function create(Request $request)
    {
        // Insert ke table users
        $user = new \App\Models\User;
        $user->role = 'karyawan';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt('password');
        $user->remember_token = Str::random(60);
        $user->save();
        
        // Insert ke table karyawan
        $request->request->add(['user_id' => $user->id]);
        $karyawan = \App\Models\karyawan::create($request->all());

        return redirect('/karyawan')->with('sukses','Data berhasil disubmit!');
    }

    public function edit($id)
    {
        $karyawan = \App\Models\karyawan::find($id);
        
        return view('karyawan/edit',['karyawan' => $karyawan]);
    }

    public function update(Request $request,$id)
    {
        // dd($request->all());
        $karyawan = \App\Models\karyawan::find($id);
        $user = \App\Models\User::find($karyawan->user_id);

        $karyawan->update($request->all());
        $user->update(['name' => $karyawan->nama_depan]);

        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images',$request->file('avatar')->getClientOriginalName());
            $karyawan->avatar = $request->file('avatar')->getClientOriginalName();
            $karyawan->save();
        }

        return redirect()->back()->with('sukses','Data berhasil diupdate!');
    }
    
    public function delete($id)
    {
        $karyawan = \App\Models\karyawan::find($id);
        $user = \App\Models\User::find($karyawan->user_id);

        $karyawan->delete();
        $user->delete();
        
        return redirect('/karyawan')->with('sukses','Data berhasil dihapus!');
    }
    
    public function profile($id)
    {
        $karyawan = \App\Models\karyawan::find($id);
        return view('karyawan.profile',['karyawan' => $karyawan]);
    }
}
