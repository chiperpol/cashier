<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterMeja extends Model
{
    use HasFactory;

    protected $table = 'master_meja';

    protected $fillable = [
        'namaMeja',
        'lantai',
        'status'    
    ];

    public $timestamps = true;
}
