<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AssetRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'Signature'=>'string|required',
            'CategoryID'=>'numeric|required|max:11',
            // 'BrandName'=>'string|required|max:255',
            // 'CarriedBy'=>'email|required|max:255|unique:assets,CarriedBy,'.$request->id
        ];
    }
}
