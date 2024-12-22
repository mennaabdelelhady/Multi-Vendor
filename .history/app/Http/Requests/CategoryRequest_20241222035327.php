<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Filter;
use App\Models\Category;
use Illuminate\Validation\Rule;
//use Illuminate\Validation\Rules\Filter;
use Illuminate\Support\Facades\Gate;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->route('category');
        return Category::rules($id);

        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
                Rule::unique('categories', 'name')->ignore($id),
                new Filter(['laravel', 'admin', 'php', 'restricted'])

            ],
        ];
    }

    public function messages(){
        return [
            'name.unique' => 'This name is already exits!',
        ];
    }
}
