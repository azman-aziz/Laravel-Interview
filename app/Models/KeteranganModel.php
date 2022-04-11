<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeteranganModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama', 'intelegensi', 'numerical', 'id'
    ];
}
