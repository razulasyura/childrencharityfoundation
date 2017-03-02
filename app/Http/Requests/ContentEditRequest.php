<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentEditRequest extends FormRequest
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
        return [
            'name_id'=>'',
            'name_en'=>'',
            'detail_id'=>'',
            'detail_en'=>'',
            'photo' => '',
            'sort'=>'',
        ];
    }
}
