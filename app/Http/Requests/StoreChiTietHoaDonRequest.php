<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreChiTietHoaDonRequest extends FormRequest
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
            'mahd'=>'required|integer|exists:hoadon,id',
            'tensp'=>'required|string|max:100',
            'soluong'=>'required|integer|min:1',
            'dongia'=>'required|numeric|min:1',
            'masp'=>'required|integer|exists:sanpham,MaSP',
        ];
    }

    public function messages()
    {
        return [
            'soluong.min'=>'Số lượng phải lớn hơn 0 để in hóa đơn.',
            'dongia.min'=>'Đơn giá phải lớn hơn 0 để in hóa đơn.',
        ];
    }
}
