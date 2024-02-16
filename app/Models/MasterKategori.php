<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterKategori extends Model
{
    use HasFactory;

    protected $table = 'master_kategori';

    protected $fillable = [
        'namaKategori',
        'status',
    ];

    public $timestamps = true;
}
