<?php

namespace App\GraphQL\Mutations;

use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class CreateCustomer
{
    /**
     * Create a new class instance.
     */
    public function __invoke($rootValue, array $args)
    {
        // Encrypt the password
        $args['password'] = Hash::make($args['password']);

        // Crate customer
        return Customer::create($args);
    }
}
