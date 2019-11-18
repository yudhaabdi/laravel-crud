<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Siswa extends Model
{
    use SoftDeletes;
    protected $table = 'siswa';
    protected $dates = ['deleted_at'];
    protected $fillable = ['nama', 'jenis_kelamin', 'agama', 'alamat', 'avatar', 'user_id'];

    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('images/default.jpg');
        }
        return asset('images/'. $this->avatar);
    }

    public function mapel()
    {
        return $this->belongsToMany('App\Mapel', 'mapel_siswa')->withPivot('nilai');
    }

    public function rataRataNilai()
    {
        $total = 0;
        $hitung = 0;
        $hasil = 0;
        // dd($this->mapel);
        if($this->mapel->count()>0){
            foreach ($this->mapel as $mapel) {
                $total = $total + $mapel->pivot->nilai;
                $hitung++;
            }
            $hasil = round($total/$hitung);
        }else{
            $hasil = 0;
        }
        return $hasil;
    }

    
    
}
