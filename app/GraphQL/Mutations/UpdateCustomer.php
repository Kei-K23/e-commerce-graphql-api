<?php

namespace App\GraphQL\Mutations;

use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class UpdateCustomer
{
    /**
     * Create a new class instance.
     */
    public function __invoke($rootValue, $args)
    {
        // FInd the customer by ID
        $customer = Customer::findOrFail($args['id']);

        if (isset($args['password'])) {
            $args['password'] = Hash::make($args['password']);
        }

        $customer->update($args);
        return $customer;
    }
}
