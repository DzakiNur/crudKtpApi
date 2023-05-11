<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KTP extends Model
{
    use HasFactory;
    use softDeletes;

    protected $fillable =
    [
        'nik',
        'nama',
        'tmptlahir',
        'tgllahir',
        'jk',
        'alamat',
        'rt',
        'rw',
        'desa',
        'propinsi',
        'kecamatan',
        'agama',
        'status',
        'pekerjaan',
        'wrgnegara',
    ];
}
