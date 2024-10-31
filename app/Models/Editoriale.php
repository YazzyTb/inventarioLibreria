<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editoriale extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'nombre',
    ];

    public function Productos()
    {
        return $this->hasMany(Producto::class, 'editoriale_id');
    }
}
