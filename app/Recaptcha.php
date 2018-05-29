<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;

class Recaptcha extends Model
{
     protected $fillable = [
        	'id',	
            'public_key',
            'private_key',
        
    ];
}
