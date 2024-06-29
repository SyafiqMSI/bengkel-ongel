<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SparePart extends Model
{
    use HasFactory;

    protected $table = 'spare_parts';

    protected $fillable = [
        'id_spare_part',
        'nama_spare_part',
        'gambar',
        'deskripsi',
        'harga',
        'stock_spare_part',
        'tanggal_masuk',
    ];

    protected $primaryKey = 'id_spare_part';
    public $incrementing = false;
    protected $keyType = 'int';
}
