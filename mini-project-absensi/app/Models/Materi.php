<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $table = 'tb_materi';

    protected $fillable = [
        'nama_materi',
    ];
    protected $hidden = [
        'id',
    ];
}
