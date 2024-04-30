<?php
    require "../../vendor/autoload.php";

    $stripe_secret_key = "sk_test_51P9nN2LXPHcBFoEII4XfOa3wvcUkXqHWnOoedmN8xam506nYeJMl1KYMnR0dDBr3PneYAhBMVeBuRywXQlGtkubp006V6HJvdo";
   
    \Stripe\Stripe::setApiKey($stripe_secret_key);
    $checkout_session = \Stripe\Checkout\Session::create([
        "mode" => "payment",
        "success_url" => "http://localhost/web_dev_3/pages/action/payment_success.php",
        "cancel_url" => "http://localhost/web_dev_3/pages/Home.php",
        "locale" => "fr",
        "line_items" => [
            [
                "quantity" => 1,
                "price_data" => [
                    "currency" => "xaf",
                    "unit_amount" => 12000,
                    "product_data" => [
                        "name" => "100 jours de code"
                    ]
                ]
            ],

            [
                "quantity" => 2,
                "price_data" => [
                    "currency" => "xaf",
                    "unit_amount" => 12000,
                    "product_data" => [
                        "name" => "Maitriser le développement web en 30 jours"
                    ]
                ]
            ],
        ]        
    ]);

    http_response_code(303);
    header("Location: " . $checkout_session->url);

?>

