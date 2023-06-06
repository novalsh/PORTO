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
        'photo',
        'nama',
        'description',
        'id_category',
    ];

    public $timestamps = false; // menonaktifkan fitur timestamps

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category', 'id');
    }
}

