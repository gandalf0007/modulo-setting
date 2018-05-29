<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
	protected $fillable = [
        'id',
        'formasdepago',
        'garantia',
        'avisolegal',
        'envios',
        'preguntas',
    ];
}
