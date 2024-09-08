<?php

namespace App\Resolvers;

use App\Models\Order;

class OrderResolver
{
    public function placeOrder($root, array $args)
    {
        // Create the order
        $order = Order::create([
            'customer_id' => $args['customer_id'],
            'status' => 'PENDING',
        ]);

        // Attach products to the order via the pivot table
        $order->products()->attach($args['product_ids']);

        return $order;
    }
}
