<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;
use App\Mapel;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::all();
        $mapel = Mapel::all();
        return view ('guru.index', [
            'guru' => $guru,
            'mapel' => $mapel
            ]);
    }

    public function create(Request $request)
    {
        // $guru = Guru::insert([
        //     'nama' => $request->nama,
        //     'telp' => $request->telp,
        //     'alamat' => $request->alamat,
        //     ]);
        $guru = new Guru;
        $guru->nama = $request->nama;
        $guru->telp = $request->telp;
        $guru->alamat = $request->alamat;
        $guru->save();
    }
}
