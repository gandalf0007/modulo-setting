<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;

class Mercadopago extends Model
{
     protected $fillable = [
        	'id',	
            'public_key',
            'private_key',
            'porcentaje',
        
    ];
}
