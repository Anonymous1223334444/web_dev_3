<?php 
    // Disable error reporting
    error_reporting(0);

    // Or, disable only warnings
    error_reporting(E_ERROR | E_PARSE);
    session_start();
    $session_login = $_SESSION['email'] ?? null;

    include 'includes/navigation.php';

    $session_id = $_SESSION['CHECKOUT_SESSION_ID'] ?? null;

    if($_SESSION['CHECKOUT_SESSION_ID']) {

        require '../vendor/autoload.php';
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
        $status = getCheckoutSessionStatus($session_id);
    }

    // $host = "localhost";
    // $uName = "project";
    // $pass = "1223334444";
    // $dbName = "web_project";

    // // Create connection
    // $conn = new mysqli($host, $uName, $pass, $dbName);

    // // Check connection
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" type="text/css">
    <title><?= $row["titre"] ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
    <style>
        <?php 
            include '../public/css/course_detail.css';
            include '../public/css/navigation.css';
        ?> 

        .main-nav {
                background-color: #000;
                color: #ffffff;
            }

        #content-list{
            padding: 1rem 3rem;
            border-radius: 5px;
        }


        #content:hover{
            background-color: #EEEEEE;
        }
    </style>

    <header class="header">

        <button class="btn-mobile-nav">
            <ion-icon class="icon-mobile-nav" name="menu-outline"></ion-icon>
            <ion-icon class="icon-mobile-nav" name="close-outline"></ion-icon>
        </button>
    </header>
    
    <?php
        // if(isset($_SESSION['email']) && isset($_SESSION['prenom']) && $_SESSION["role"] === "apprenant") {
        //     $sql = "SELECT titre, photo, prix, categorie, description, id_formateur FROM cours";
        //     $result = $conn->query($sql);
        //     $row = $result->fetch_assoc();

        //     $sql2 = "SELECT CONCAT_WS(' ', prenom, nom) as name_formateur FROM formateur WHERE id = " . $row["id_formateur"];
        //     $result2 = $conn->query($sql2);
        //     $row2 = $result2->fetch_assoc();
    
        //     if ($result->num_rows > 0) {
        //         // Output data of each row
        //         while($row) {
    ?>
    
    <main class="content_details">
        <div class="desc">
            <h2 id="details-title"></h2>
            <p id="details-description" style="width: 90%;"></p>
            <div class="extend">
                <div class="formateur">
                    <p>4.2 <span>⭐⭐⭐⭐⭐</span></p>
                    <i id="details-teacher"></i>
                </div>
                <p class="categorie" style="color: #000;" id="details-categorie"></p>
            </div>
        </div>

        <?php 
            $path="";
            if(session_status() !== PHP_SESSION_NONE){
                if($status === 'succeeded') { 
                    $path="../public/img/open.png";
                    ?>
                    <div class='price_card'>
                        <h2>Inclus</h2>
                        <p id="details-price"><span>francs</span></p>
                        <ul>
                            <li>30 heures de contenu video</li>
                            <li>9 documents téléchargeables</li>
                            <li>Accessibilité illimitée</li>
                            <li>Certificat de complétion</li>
                        </ul>
                    </div>
                
                    
                    <div class="content">
                        <h2>Contenu de la formation</h2>
                        <ul>
                        <?php 
                            for ($i = 1; $i <= 5; $i++) { ?>
                                <li onclick="window.location.href = 'http://localhost/web_dev_3/pages/content/course1/watch.php'" style="cursor: pointer;">
                                    <p>Section <?php echo $i; ?></p>
                                    <p><img style="height: 3.5rem;" src="../public/img/open.png" alt=""></p>
                                </li>
                        <?php } ?>

                        <?php
                            for ($i = 6; $i <= 15; $i++) { ?>
                                <li onclick="window.location.href = 'http://localhost/web_dev_3/pages/content/course1/watch.php'" style="cursor: pointer;">
                                    <p>Section <?php echo $i; ?></p>
                                    <p><img style="height: 3.5rem;" src="<?= $path ?>" alt=""></p>
                                </li>
                            <?php } ?>
                            
                        </ul>
                    </div>
                    
                <?php } else { 
                    $path="../public/img/close.png";
                ?>  
                <div class='price_card'>
                    <h2>Inclus</h2>
                    <p id="details-price"></p>
                    <ul>
                        <li>30 heures de contenu video</li>
                        <li>9 documents téléchargeables</li>
                        <li>Accessibilité illimitée</li>
                        <li>Certificat de complétion</li>
                    </ul>
                    <button id='pay_btn'>Payer</button>
                </div>

                <div class="content">
                    <h2>Contenu de la formation</h2>
                    <ul>
                        <?php 
                            for ($i = 1; $i <= 5; $i++) { ?>
                                <li onclick="window.location.href = 'http://localhost/web_dev_3/pages/content/course1/watch.php'" style="cursor: pointer;">
                                    <p>Section <?php echo $i; ?></p>
                                    <p><img style="height: 2.5rem;" src="../public/img/open.png" alt=""></p>
                                </li>
                        <?php } ?>

                        <?php
                            for ($i = 6; $i <= 15; $i++) { ?>
                                <?php
                                    if(isset($_SESSION['email']) && isset($_SESSION['prenom'])) {
                                ?>
                                    <li onclick="window.location.href = 'http://localhost/web_dev_3/pages/pay_method.php'" style="cursor: pointer;">
                                        <p>Section <?php echo $i; ?></p>
                                        <p><img style="height: 3.5rem;" src="<?= $path ?>" alt=""></p>
                                    </li>
                                <?php } else{ ?>
                                    <li onclick="window.location.href = 'http://localhost/web_dev_3/pages/Login.php'" style="cursor: pointer;">
                                        <p>Section <?php echo $i; ?></p>
                                        <p><img style="height: 3.5rem;" src="<?= $path ?>" alt=""></p>
                                    </li>
                            <?php } ?>
                        <?php } ?>
                        
                    </ul>
                </div>
                    
            <?php }
            ?>
            <?php } ?>
        
        <?php ?>
        

        
    </main>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);

            const titre = urlParams.get('titre');
            const prix = urlParams.get('prix');
            const categorie = urlParams.get('categorie');
            const description = urlParams.get('description');
            const nameFormateur = urlParams.get('nameFormateur');
            const photo = urlParams.get('photo');

            document.getElementById('details-title').textContent = titre;
            // document.getElementById('details-photo').src = `../public/uploads/cours/${photo}`;
            document.getElementById('details-description').textContent = description;
            document.getElementById('details-price').innerHTML = `${prix} <span>francs</span>`;
            document.getElementById('details-categorie').textContent = categorie;
            document.getElementById('details-teacher').textContent = nameFormateur;
        });
        
        let pay = document.querySelector("#pay_btn")

        pay.addEventListener("click", function(e) {
            <?php
                if(isset($_SESSION['email']) && isset($_SESSION['prenom'])) {
            ?>
                window.location.href = "http://localhost/web_dev_3/pages/pay_method.php";
            <?php } else{ ?>
                window.location.href = "http://localhost/web_dev_3/pages/Login.php";
            <?php } ?>
        })
        
        <?php
            include "../public/js/script.js";
        ?>
        

    </script>
</body>
</html>

<?php
//         }
//     }
// }
?>