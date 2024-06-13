<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    //untuk memproteksi field id
    protected $guarded = ['id'];//tambahan
    //untuk relasi one to many
    public function users() {//tambahan
        return $this->hasMany(User::class);//tambahan
    }//tambahan
}
