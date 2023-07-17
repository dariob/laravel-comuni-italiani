<?php

namespace Dariob\LaravelComuniItaliani\Models;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table = 'province';

    public function regione()
    {
        return $this->belongsTo(Regione::class, 'regione_id');
    }

    public function comuni()
    {
        return $this->hasMany(Comune::class, 'provincia_id');
    }
}
