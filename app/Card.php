<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [
        'product_id', 'qtd', 'code',
        'unitary_value', 'total'
    ];

    protected $guarded = ['id', 'created_at', 'update_at'];

}

