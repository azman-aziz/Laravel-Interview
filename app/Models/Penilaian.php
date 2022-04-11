<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'email', 'nilai_x', 'nilai_y', 'nilai_z', 'nilai_w'
    ];
}
