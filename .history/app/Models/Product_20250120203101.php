<?php

namespace App\Models;
//use Illuminate\Database\Eloquent\Builder;
use App\Models\Scopes\StoreScope;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory;

    protected static function booted()
    {
        static::addGlobalScope('store',new StoreScope());
    }

    public function category()
    {
        return $this->belongsTo(Category::class); 
    }
}
