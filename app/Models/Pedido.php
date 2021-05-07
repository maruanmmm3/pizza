<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Pedido extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at', 'updated_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    //Reacion muchos a muchos
    public function productos(){
        return $this->belongsToMany(Producto::class);
    }
}
