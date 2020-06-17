<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->segment(3);

        return [
            'title' => ['required', 'min:2', 'max:100', "unique:products,title,{$id},id"],
            'category_id' => ['required'],
            'description' => ['required','min:2','max:255'],
            'price'       => ['required'],
            'image'       => ['required', 'image']
        ];

        if ($this->method() == 'PUT') {
            $rules['image'] = ['nullable', 'image'];
            $rules['category_id'] = ['nullable'];
            $rules['price'] = ['nullable'];
        }

        return $rules;
    }
}
