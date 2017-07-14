<?php

include __DIR__ . '/../vendor/autoload.php';

try {
    $client = new \zaporylie\Tripletex\Client\TripletexClient([
        // Add session token received from 01-auth.php.
        'session_token' => '62ae8bda-63a3-48a4-b790-15e4612c0331',
    ]);
    $app = new \zaporylie\Tripletex\Tripletex($client);

    // Access order API.
    $orders = $app->order();

    // Create order.
    $order = new \zaporylie\Tripletex\Model\Order\Order();
    $order->setOrderDate(new \DateTime('now'));
    $order->setDeliveryDate(new \DateTime('+1 week'));
    // Should price include or exclude VAT.
    $order->setIsPrioritizeAmountsIncludingVat(true);
    // Set customer.
    $order->setCustomer((new \zaporylie\Tripletex\Model\Customer\Customer())->setId());
    var_dump($response = $orders->createOrder($order));

    // Get order.
    var_dump($orders->getOrder($response->getValue()->getId()));

    // Get order list.
    var_dump($orders->getList(new DateTime('-7 day'), new DateTime('+1 day')));
}
catch (Exception $exception) {
    var_dump($exception);
}
