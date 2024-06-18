<?php
    require "../../vendor/autoload.php";
    $host = "localhost";
    $uName = "project";
    $pass = "1223334444";
    $dbName = "web_project";
    $table = "administrateur";

    // Create connection
    $conn = new mysqli($host, $uName, $pass, $dbName);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $stripe_secret_key = "sk_test_51PIUGvP6AMZ4sEVHuUgiVJX0srBT1xlCsfnrjbeijRoScYuYtZUgPUXOE7gnSTgYEd7YECLJkMjUExXGKEW9bJmu002B57Ju0B";
    \Stripe\Stripe::setApiKey($stripe_secret_key);
    
    // header('Content-Type: application/json');
    
    session_start();
    $checkout_session = \Stripe\Checkout\Session::create([
        "mode" => "payment",
        "success_url" => "http://localhost/web_dev_3/pages/action/payment_success.php?session_id={CHECKOUT_SESSION_ID}",
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


    // Store the session ID in the user's session
    $_SESSION['CHECKOUT_SESSION_ID'] = $checkout_session->id;

    // echo json_encode(['id' => $checkout_session->id]);
    // Retrieve the session ID
    $session_id = $checkout_session->id;
    // echo json_encode(['id' => $session->id]);

    http_response_code(303);
    header("Location: " . $checkout_session->url);

?>

