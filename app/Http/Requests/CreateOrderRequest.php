<?php

namespace App\Http\Requests;

use App\Models\Product;
use App\Rules\LatitudeLongitude;
use App\Rules\ProductExist;
use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "latitude"=>["required",new LatitudeLongitude()],
            "longitude"=>["required",new LatitudeLongitude()],
            "country"=>["required","string","min:2"],
            "city"=>["required","string","min:2"],
            "state"=>["required","string","min:2"],
            "line1"=>["required","string","min:2"],
            "line2"=>["string","min:2"],
            "products"=>["required",new ProductExist()]
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


}
