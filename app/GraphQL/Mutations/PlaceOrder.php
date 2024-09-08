<?php

namespace App\GraphQL\Mutations;

use App\Models\Customer;
use App\Models\Order;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Execution\Utils\Subscription;

class PlaceOrder
{
    public function __invoke(mixed $root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo): Order
    {
        // Ensure customer exists first
        $customer = Customer::find($args['customer_id']);
        if (!$customer) {
            throw new \Exception("Customer not found.");
        }

        // Create the order
        $order = Order::create([
            'customer_id' => $args['customer_id'],
            'status' => 'PENDING',
        ]);

        // Attach products to the order via the pivot table
        $order->products()->attach($args['product_ids']);


        // Broadcast to the subscription
        Subscription::broadcast('orderPlaced', $order);

        return $order;
    }
}
