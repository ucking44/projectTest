<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PTA extends Model
{
    protected $table = 'ptas';

    protected $primaryKey = 'pta_rate_id';

        protected $fillable = [
            'country',
            'pta_name',
            'value',
            'status',
        ];
}

