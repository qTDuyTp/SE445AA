<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHoaDonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'makh'    => 'required|integer|exists:khachhang,id',
            'ngaylap' => 'required|date',
            'tongtien'=> 'required|numeric|min:1',
        ];
    }

    public function messages()
    {
        return [
            'tongtien.min' => 'Tổng tiền phải lớn hơn 0 để in hóa đơn.',
        ];
    }
}
