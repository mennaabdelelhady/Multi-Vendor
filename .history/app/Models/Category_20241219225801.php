<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parent_id',
        'description',
        'image',
        'status',
        'slug'
    ];

   public static function rules($id = 0)
   {
    return [
        
            'name' => "required|string|min:3|max:255|unique:categories,name,$id",
            function($attribute, $value, $fails){
                if($value == 'laravel'){
                    $fails('This name is forbidden');
                }

            },
            'parent_id' => 'nullable|integer|exists:categories,id',
            'image' => 'image|mimes:jpg,jpeg,png,gif,svg|max:1048576,dimensions:min_width=100,min_height=100',
            'status' =>'required|in:active,archived',

        
        ];
   }
}
