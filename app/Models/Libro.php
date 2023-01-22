<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $fillable= ['titulo', 'resumen', 'pvp', 'stock', 'user_id'];

    public function user(){ //en sing pq un libro solo pertenece a un autor
        return $this->belongsTo(User::class);
    }
}
