<?php

    session_start();
    include '../utils/Util.php';
    include '../includes/navigation.php';


    require '../../vendor/autoload.php';

    \Stripe\Stripe::setApiKey('sk_test_51PIUGvP6AMZ4sEVHuUgiVJX0srBT1xlCsfnrjbeijRoScYuYtZUgPUXOE7gnSTgYEd7YECLJkMjUExXGKEW9bJmu002B57Ju0B');

    function getCheckoutSessionStatus($session_id) {
        try {
            $session = \Stripe\Checkout\Session::retrieve($session_id);
            $payment_intent_id = $session->payment_intent;
            $payment_intent = \Stripe\PaymentIntent::retrieve($payment_intent_id);
            return $payment_intent->status;
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    // Retrieve the session ID from the user's session
    $session_id = $_SESSION['CHECKOUT_SESSION_ID'] ?? null;

    if ($session_id) {
        $status = getCheckoutSessionStatus($session_id);
    } else {
        echo 'Session ID not found';
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payement Effectué</title>
</head>
<body>
    <style>
        <?php
            include '../../public/css/navigation.css';
        ?>

            .main-nav {
                background-color: #000;
                color: #ffffff;
            }
        .container {
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            transform: translate(25%, 100%);
        }


        .container h1 {
            align-items: center;
        }

        .learn_btn,
        .learn_rtn {
            display: block;
            border-radius: 1rem;
            padding: 1rem 0;
            width: 50%;
            font-size: 1.5rem;
            display: grid;
            margin-top: 2rem;
            cursor: pointer;
        }

        .learn_btn {
            background-color: #000;
            border: none;
            color: #ffffff;
        }

        .learn_rtn {
            background-color: #ffffff;
            color: #000;
            border: 1px solid #000;
        }

        .learn_rtn:hover {
            color: #ffffff;
            background-color: #000;
        }

    </style>
    <div class="container">
        <h1>Félicitation, achat effectué !</h1>
        <form method="POST" action="../course_detail.php">
            <button class="learn_btn">Commencer votre apprentissage</button>
        </form>
        <form method="POST" action="../Home.php">
            <button class="learn_rtn">Retourner à l'accueil</button>
        </form>
    </div>

</body>
</html>