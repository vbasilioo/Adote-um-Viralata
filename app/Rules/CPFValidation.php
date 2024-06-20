<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CPFValidation implements ValidationRule{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!$this->isValidCPF($value)) 
            $fail("The {$attribute} is invalid.");
    }

    private function isValidCPF($cpf): bool
    {
        $cpf = preg_replace('/[^0-9]/', '', $cpf);
        if(strlen($cpf) != 11)
            return false;

        if(preg_match('/(\d)\1{10}/', $cpf))
            return false;

        for($i = 9; $i < 11; $i++){
            for($j = 0, $sum = 0; $j < $i; $j++)
                $sum += $cpf[$j] * (($i + 1) - $j);
            $sum = ((10 * $sum) % 11) % 10;
            if($cpf[$j] != $sum)
                return false;
        }

        return true;
    }
}