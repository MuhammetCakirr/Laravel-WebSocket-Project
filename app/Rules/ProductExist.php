<?php

namespace App\Rules;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ProductExist implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {


        foreach ($value as $id=>$quantity) {
//            dd($id,$quantity);
            if (!is_numeric($id)) {
                $fail("All product IDs must be of the number type.");
            }
            $product=Product::query()->where('id', $id)->first();
//            dd($product);
            if (!$product) {
                $fail("The product belonging to this id has not been found.");
            }

            if($quantity > $product->stock)
            {
                $fail($product->name." doesn't have that much stock. available stock is " .$product->stock);
            }
        }


    }


}
