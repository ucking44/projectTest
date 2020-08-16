<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Fx extends Model
{
    protected $table = 'fxes';

    protected $primaryKey = 'fx_id';

        protected $fillable = [
            'country',
            'currency',
            'fx_buy',
            'fx_sell',
            'status',
        ];

}
