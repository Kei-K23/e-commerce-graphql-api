<?php

namespace App\GraphQL\Mutations;

use App\Models\Customer;
use App\Models\Order;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use GraphQL\Type\Definition\ResolveInfo;

class PlaceOrder
{
    /**
     * Handle the placeOrder mutation.
     *
     * @param mixed $root Always null, since this field has no parent.
     * @param array $args The arguments passed by the client (e.g., customer_id, product_ids).
     * @param GraphQLContext $context Shared between all fields.
     * @param ResolveInfo $resolveInfo Metadata for advanced query resolution.
     *
     * @return Order The newly created Order.
     */
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

        return $order;
    }
}
