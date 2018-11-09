<?php

namespace App\Rules;

use App\Products;
use Illuminate\Contracts\Validation\Rule;

class CheckTenSP implements Rule
{
    protected $name;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $product = Products::where('name',$this->name)->first();
        if($product){
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Tên sản phẩm đã tồn tại';
    }
}
