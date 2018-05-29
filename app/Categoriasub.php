<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;
use Soft\Producto;
use Soft\Categoria;

class Categoriasub extends Model
{
    protected $fillable = [
        	'id',
        	'nombre',
            'slug',
        	'categoria_id',
        	'icono',
            
    ];


    public function categoria()
    {
        //un sub-categoria puede tener una categoria
        return $this->belongsTo(Categoria::class);
    }

     public function producto()
    {
        //una sub-categoria puede tener muchas productos
       return $this->hasMany(Producto::class);
    }



}
