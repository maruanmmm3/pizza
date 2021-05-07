<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'slug' , 'precio', 'categoria_id', 'descripcion'];

    public function getRouteKeyName()
    {
        return "slug";
    }

    //Relacion muchos a muchos
    public function pedidos(){
        return $this->belongsToMany(Pedido::class);
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function imagen(){
        return $this->morphOne(Imagen::class, 'imageable');
    }
}

