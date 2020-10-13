<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Latihan extends Model
{
    use HasFactory;

    protected $table = 'latihan';

    protected $fillable = [
        //  $fillable =  untuk mendaftarkan atribut (nama kolom) yang bisa kita isi ketika melakukan insert atau update ke database.
        'nama_murid','status_murid','nilai_tugas', 'nilai_pts', 'nilai_uas',
      ];
}
