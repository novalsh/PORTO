<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';
    protected $primaryKey = 'id';
    protected $fillable = [
        'jenis'
    ];

    public $timestamps = false; // menonaktifkan fitur timestamps

    public function portfolios()
    {
        return $this->hasMany(Portofolio::class, 'id_category');
    }
    
}
