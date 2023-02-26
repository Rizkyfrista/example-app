<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;

    /**
     * fillable
     *php
     * @var array
     */
    protected $fillable = [
        'jenjangpendidikanterakhir', 'namaintitusiakademik', 'jurusan', 'tahunlulus', 'ipk'
    ];
}
