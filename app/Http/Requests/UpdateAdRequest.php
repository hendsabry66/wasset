<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Ad;

class UpdateAdRequest extends FormRequest
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
            'name'=>'required|string|min:2|max:50',
            //'name_ar'=>'required|string|min:2|max:50',
            'communication'=>'required',
            'latitude'=>'required',
            'longitude'=>'required',
            'details'=>'required',
            //'details_ar'=>'required',
            'user_id'=>'required',
            'country_id'=>'required',
            'city_id'=>'required',
           // 'commentable' =>'required',
        ];
    }
}
