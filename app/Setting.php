<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

 protected $fillable = [
        'id',
        'empresa',
        'direccion',
        'telefono',
        'whatsapp',
        'email',
    ];
}
