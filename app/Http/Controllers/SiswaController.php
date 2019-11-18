<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\User;
use App\Mapel;
use DataTables;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;


class SiswaController extends Controller
{
    public function json()
    {
        return DataTabels::of(Siswa::all())->make(true);
    }

    public function index()
    {
        $siswa = Siswa::all();
        return view('siswa.index', ['siswa' => $siswa]);
    }

    public function dataSiswa()
    {
        $siswa = Siswa::all();
        return view('siswa.dataSiswa', ['siswa' => $siswa]);
    }

    public function create(Request $request)
    {
        // insert tabel user
        $user = new User;
        $user->role = 'siswa';
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt($request->nama);
        $user->save();
        // insert data ke table siswa
        // $request->request->add(['user_id' => $user->id]);
        // $siswa = Siswa::create($request->all());
        $siswa = Siswa::insert([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'user_id' => $user->id,
            ]);

        // alihkan halaman ke halaman siswa
        echo 'sukses';
        // return redirect('/siswa')->with('sukses', 'Data berhasil ditambah');
    }

    public function edit($id)
    {
        $siswa = Siswa::all();
		// mengambil data siswa berdasarkan id yang dipilih
        $siswa = Siswa::where('id', $id)->get();
		// passing data siswa yang didapat ke view edit.blade.php
		return view('siswa/edit',['siswa' => $siswa]);
    }

    public function update(Request $request)
	{
        $siswa = Siswa::find($request->id);
        $siswa->nama = $request->nama;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->agama = $request->agama;
        $siswa->alamat = $request->alamat;
        $siswa->save();
        //memindahkan folder avatar
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
		// alihkan halaman ke halaman data barang
		return redirect('/siswa')->with('sukses', 'Data berhasil dirubah');
    }
    
    public function delete($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();
        return redirect ('/siswa');
    }

    public function profile($id)
    {
        $siswa = Siswa::find($id);
        $matapelajaran = Mapel::all();

        //menyiapkan data untuk chart
        $categories = [];
        $data = [];
        foreach ($matapelajaran as $mp) {
            if ($siswa->mapel()->wherePivot('mapel_id', $mp->id)->first()) {
                $categories[] = $mp->nama;
                $data[] = $siswa->mapel()->wherePivot('mapel_id', $mp->id)->first()->pivot->nilai;
            }

        }
        //dd($data);
        
        //dd($matapelajaran);
            return view('siswa.profile', [
                'siswa' => $siswa,
                'matapelajaran' => $matapelajaran,
                'categories' => $categories,
                'data' => $data
                ]);
        
    }

    public function addnilai(Request $request, $id)
    {
        //dd($request->all());
        $siswa = Siswa::find($id);
        //kondisi jika sudah memiliki mata pelajaran yg sama
        if ($siswa->mapel()->where('mapel_id', $request->mapel)->exists()) {
            return redirect('siswa/'.$id.'/profile')->with('error', 'data pelajaran sudah ada');
        }

        $siswa->mapel()->attach($request->mapel, ['nilai' => $request->nilai]);

        return redirect('siswa/'.$id.'/profile')->with('sukses', 'data berhasil di tambah');
    }

    public function delete_nilai($id, $id_mapel)
    {
        $siswa = Siswa::find($id);
        //detach = melepaskan pivotnya
        $siswa->mapel()->detach($id_mapel);
        return redirect()->back()->with('sukses', 'data berhasil di hapus');
    }

    public function exportExcel() 
    {
        return Excel::download(new SiswaExport, 'Siswa.xlsx');
    }

    public function exportPdf()
    {
        $siswa = Siswa::all();
        $pdf = PDF::loadView('Export.siswaPdf', ['siswa' => $siswa]);
        return $pdf->download('siswa.pdf');
    }
}
