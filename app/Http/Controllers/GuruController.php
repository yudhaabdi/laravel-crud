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
}
