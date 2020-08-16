<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InterestRate extends Model
{
    protected $table = 'interest_rates';

    protected $primaryKey = 'interest_rate_id';

        protected $fillable = [
            'country',
            'interest_category',
            'above_5m',
            'below_5m',
            'status',
        ];
}
