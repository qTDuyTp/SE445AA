<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSanPhamRequest extends FormRequest
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
             'MaSP'=>'required|integer|unique:sanpham,MaSP',
            'TenSP'=>'required|string|max:100',
            'MoTa'=>'nullable|string',
            'GiaBan'=>'required|numeric|min:1', // min 1 để đủ điều kiện in
            'HinhAnh'=>'nullable|url|max:255',
            'MaKho'=>'required|integer|exists:khohang,MaKho',
        ];
    }

    public function messages()
    {
        return [
            'GiaBan.min'=>'Giá bán phải lớn hơn 0 để in sản phẩm.',
        ];  
    }
}
