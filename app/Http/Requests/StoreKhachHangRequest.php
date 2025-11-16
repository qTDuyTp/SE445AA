<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKhachHangRequest extends FormRequest
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
            'tenkh'=>'required|string|max:100',
            'email'=>'nullable|email|max:100|unique:khachhang,email',
            'sdt'=>'nullable|regex:/^[0-9]{10,11}$/',
        ];
    }

    public function messages()
    {
        return [
            'GiaBan.min'=>'Giá bán phải lớn hơn 0 để in sản phẩm.',
        ];
    }
}
