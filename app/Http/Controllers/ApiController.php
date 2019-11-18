<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;

class ApiController extends Controller
{
    public function edit_nilai(Request $request, $id)
    {
        // return $request->all();
        // dd($request);
        $siswa = Siswa::find($id);
// dd($siswa->mapel());
        $siswa->mapel()->updateExistingPivot($request->pk,['nilai' => $request->value]);
    }
}
