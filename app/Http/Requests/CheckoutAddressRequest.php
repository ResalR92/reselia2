<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class CheckoutAddressRequest extends Request
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
        $new_address_rules = [
            'name' => 'required',
            'detail' => 'required',
            'province_id' => 'required|exists:provinces,id',
            'regency_id' => 'required|exists:regencies,id',
            'phone' => 'required|digits_between:9,15'
        ];
        return $new_address_rules;
    }
}
