<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class validphone implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

     
    public function passes($attribute, $value)
    {
        if(!empty($value))
        {
            $non_digits=[' ','(',')','-','.','+'];
            $nums=str_replace($non_digits,'',$value);
            if(strlen($nums)==10)
            {
                return true;
            }
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "please enter valid phone number";
    }
}
