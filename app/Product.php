<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    protected $fillable = [
        'name', 'price', 'description',
        'qtd', 'image', 'category_id'
    ];
    protected $guarded = ['id', 'created_at', 'update_at'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
