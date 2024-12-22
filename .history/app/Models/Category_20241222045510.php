<?php

namespace App\Models;

use App\Rules\Filter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parent_id',
        'image',
        'slug'
    ];



   public static function rules($id = 0)
   {
    return [
        
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
                Rule::unique('categories', 'name')->ignore($id),
                'filter:laravel,admin,php,restricted',
                //new Filter(['laravel', 'admin', 'php', 'restricted']),
                /*function($attribute, $value, $fails){
                    if($value == 'laravel'){
                    $fails('This name is forbidden');
                }
            },*/
        ],
            'parent_id' => ['nullable','int','exists:categories,id'],
            'image' => [
                'image', 'max:1048576', 'dimensions:min_width=100,min_height=100',
            ],
            'status' =>'required|in:active,archived',

        
        ];
   }
}
