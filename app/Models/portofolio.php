<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class portofolio extends Model
{
    use HasFactory;

    protected $table = 'portofolio';
    protected $primaryKey = 'id';
    protected $fillable = [
        'photo',
        'nama',
        'description',
    ];

    public $timestamps = false; // menonaktifkan fitur timestamps
}
