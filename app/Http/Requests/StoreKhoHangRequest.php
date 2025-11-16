<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKhoHangRequest extends FormRequest
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
            'MaKho'=>'required|string|max:10|unique:khohang,MaKho',
            'TenSanPham'=>'required|string|max:150',
            'MaSanPham'=>'required|integer|exists:sanpham,MaSP',
            'SoLuong'=>'required|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'SoLuong.min'=>'Số lượng kho phải lớn hơn 0 để in.',
        ];
    }
}
