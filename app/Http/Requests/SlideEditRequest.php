<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideEditRequest extends FormRequest
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
            'name'=>'',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'detail'=>'',
            'active_status_id' => '',
            'oldPhoto' => ''
        ];
    }
}
