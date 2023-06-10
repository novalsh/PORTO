<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;

    protected $table = 'portofolio';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_category',
        'photo',
        'nama',
        'description',
    ];

    public $timestamps = false; // menonaktifkan fitur timestamps

    public function categories()
    {
        return $this->hasMany(Category::class, 'id', 'id_category');
    }
    
    
}

