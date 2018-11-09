<?php

namespace App\Http\Requests;

use App\Rules\CheckGiaGocGiaSale;
use App\Rules\CheckPositiveNum;
use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'tenSP' => [
                'required',
                'max:255',

            ],
            'giaGoc' => [
                'required',
                'integer',
                new CheckPositiveNum($this->giaGoc,'Giá gốc')
            ],
            'giaSale' => [
                'required',
                'integer',
                new CheckPositiveNum($this->giaSale, 'Giá sale'),
                new CheckGiaGocGiaSale($this->giaGoc, $this->giaSale)
            ],
            'anh' => ['image']
        ];
    }

}
