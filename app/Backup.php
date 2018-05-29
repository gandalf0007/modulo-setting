<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;

class Backup extends Model
{
     protected $fillable = [
        	'id',
        	'nombre',
        	'tipo',
        	'url',
            
    ];
}
