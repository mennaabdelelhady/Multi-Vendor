<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected static function booted()
    {
        static::addGlobalScope('store',function(Builder $builder){
            $user = auth()->user();
            $builder->where('store_id','=',$store_id);

        });
    }
}
