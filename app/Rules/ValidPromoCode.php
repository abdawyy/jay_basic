<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;

use App\Models\DiscountCodes; // Make sure you have the correct namespace for your DiscountCodes model
use App\Models\orders;

class ValidPromoCode implements Rule
{
    public function passes($attribute, $value)
    {
        // Step 1: Retrieve authenticated user ID
        $userId = Auth::id();

        // Step 2: Check if the promo code exists and is not expired
        $promoCode = DiscountCodes::where('code', $value)
                                 ->where('expiry_date', '>', now()) // Check if it's not expired
                                 ->first();

        // If promo code doesn't exist or is expired, fail validation
        if (!$promoCode) {
            return false; // Invalid or expired promo code
        }

        // Step 3: Check if the user has an order
        $hasOrder = orders::where('user_id', $userId)->exists();

        // Step 4: If the user has an order and the promo code is invalid, fail validation
        if ($hasOrder && !$promoCode) {
            return false; // Promo code not valid for the user with an order
        }

        // If all checks pass, return true
        return true;
    }

    public function message()
    {
        return 'The provided promo code is either invalid, expired, or not valid for your order.';
    }
}
