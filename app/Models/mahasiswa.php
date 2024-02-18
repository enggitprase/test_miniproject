<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama', 'nim', 'ymd'
    ];
    // public static function getnim($nim)
    // {
    //     $execute = mahasiswa::where( 'nim','=',$nim )->get();
    //     return $execute;
    // }

}