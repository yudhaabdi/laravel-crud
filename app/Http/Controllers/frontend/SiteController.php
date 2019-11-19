<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Siswa;

class SiteController extends Controller
{
    public function home()
    {
        return view('sites.home');
    }

    public function register()
    {
        return view('sites.register');
    }

    public function postRegister(Request $request)
    {
        //register
        $user = new User;
        $user->role = 'siswa';
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $request->request->add(['user_id' => $user->id]);
        $siswa = Siswa::create($request->all());

        return redirect('/')->with('sukses', 'pendaftaran berhasil di tambah');
    }
}
