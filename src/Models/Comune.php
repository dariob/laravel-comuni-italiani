<?php

namespace Dariob\LaravelComuniItaliani\Models;

use Illuminate\Database\Eloquent\Model;

class Comune extends Model
{
    protected $table = 'comuni';

    public function provincia()
    {
        return $this->belongsTo(Provincia::class, 'provincia_id');
    }
}
