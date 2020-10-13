<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory;

  protected $fillable = [
    //  $fillable =  untuk mendaftarkan atribut (nama kolom) yang bisa kita isi ketika melakukan insert atau update ke database.
    'product_title','product_slug','product_image',
  ];

  protected $table = "products";

  use HasFactory;
}