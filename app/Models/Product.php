<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'namaProduk', 'harga', 'deskripsi', 'status', 'kategori_id', 'pict'
    ];

    public function kategori()
    {
        return $this->belongsTo(MasterKategori::class, 'kategori_id');
    }
}
