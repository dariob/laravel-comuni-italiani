<?php

namespace Dariob\LaravelComuniItaliani\Models;

use Illuminate\Database\Eloquent\Model;

class Regione extends Model
{
    protected $table = 'regioni';

    public function province()
    {
        return $this->hasMany(Provincia::class, 'regione_id');
    }
}
