<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWepCustomerDataRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email',\Illuminate\Validation\Rule::unique('wep_customer_data')->ignore($this->user()->id),
            'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|unique:wep_customer_data',//should be unique
            'model' => 'required|string',
            'serial' => 'required|string|digits:15',
            'retailer' => 'required',
            'shop' => 'required|string',
            'purchase_date'=> 'required|date',
            'invoice' => 'required|string',
            'img_invoice' => 'nullable|file|required|max:5000|mimes:jpg,png,jpeg,pdf', //pdf included
            'accept_terms' => 'accepted',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
    return [
        'mobile.required' => 'Your Mobile Number is Required',
        'mobile.min' => 'You Must enter a 11 digit mobile number',
        'model.required' => 'You Must enter your product model',
        'serial.required' => 'You Must enter your product Serial Number',
        'shop.required' => 'You Must enter the shop address',
        'purchase_date.required' => 'You Must enter the date when You purchased the product',
        'invoice.required' => 'You Must enter your invoice number',
        'img_invoice.mimes' => 'The file format must be: JPG, JPEG, PNG or PDF',
        'img_invoice.size' => 'Image size should be less than 5MB',
        'accept_terms.accepted' => 'You need to read and accept our terms and conditions to procced',
    ];
    }
}
