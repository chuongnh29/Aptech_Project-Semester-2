<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillRequest extends FormRequest
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
            'tenKhachHang' => [
                'required'
            ],
            'soDienThoai' => [
                'required'
            ],
            'ngayGiaoHang' => [
                'required',
                'date'
            ],
            'diaChi' => [
                'required'
            ],
            'thanhToan' => [
                'required'
            ],
            'soLuong' => [
                'required',
                'integer'
            ],
            'email' => [
                'required'
            ]
        ];
    }

    public function messages()
    {
        return [
            'tenKhachHang.required' => 'Nhập tên khách hàng',
            'soDienThoai.required'  => 'Nhập số điện thoại',
            'ngayGiaoHang.required'  => 'Nhập ngày giao hàng',
            'soDienThoai.integer'  => 'Số điện thoại chỉ được chứa số',
            'ngayGiaoHang.date'  => 'Ngày giao hàng phải là dạng yyyy/mm/dd',
            'diaChi.required'  => 'Nhập địa chỉ',
            'thanhToan.required' => 'Nhập phương thức thanh toán',
            'soLuong.required' => 'Nhập số lượng sản phẩm',
            'soLuong.integer' => 'Số lượng sản phẩm phải là số dương',
            'email.integer' => 'Nhập email'
        ];
    }
}
