<?php include 'includes/navigation.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" type="text/css">
    <title>Web_Dev_Projet</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.esm.js"
    ></script>
</head>
<body>
    <style>
        <?php 
            include '../public/css/course_detail.css';
            include '../public/css/navigation.css';
        ?> 
    </style>

    <header class="header">

        <button class="btn-mobile-nav">
            <ion-icon class="icon-mobile-nav" name="menu-outline"></ion-icon>
            <ion-icon class="icon-mobile-nav" name="close-outline"></ion-icon>
        </button>
    </header>

    <main class="content_details">
        <div class="desc">
            <h2>Maitriser le développement web en 30 jours</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis dignissimos eaque nulla dolores nostrum sunt<br>nihil doloremque! Dignissimos porro odit delectus,
                libero reprehenderit dolorum fugiat rerum neque cum, mollitia quas, <br> dolores nostrum sunt dolorum fugiat rerum neque cum.</p>
            <div class="extend">
                <div class="formateur">
                    <p>4.2 <span>⭐⭐⭐⭐⭐</span></p>
                    <i>Nom Formateur</i>
                </div>
                <p id="categorie">web developpement</p>
            </div>
        </div>

        <div class="price_card">
            <h2>Inclus</h2>
            <p>12.000 <span>francs</span></p>
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
                <li>
                    <p>Section 1</p>
                    <p>🔒</p>
                </li>
                
                <li>
                    <p>Section 2</p>
                    <p>🔒</p>
                </li>
                
                <li>
                    <p>Section 3</p>
                    <p>🔒</p>
                </li>
                
                <li>
                    <p>Section 4</p>
                    <p>🔒</p>
                </li>
                
                <li>
                    <p>Section 5</p>
                    <p>🔒</p>
                </li>
                
                <li>
                    <p>Section 6</p>
                    <p>🔒</p>
                </li>
                
                <li>
                    <p>Section 7</p>
                    <p>🔒</p>
                </li>
                
                <li>
                    <p>Section 8</p>
                    <p>🔒</p>
                </li>
                
                <li>
                    <p>Section 9</p>
                    <p>🔒</p>
                </li>
                
                <li>
                    <p>Section 10</p>
                    <p>🔒</p>
                </li>
                
            </ul>
        </div>
    </main>

    <script type="text/javascript">
        let pay = document.querySelector("#pay_btn")

        pay.addEventListener("click", function(e) {
            window.location.href = "http://localhost/web_dev_3/pages/pay_method.php";
        })
        <?php
            include "../public/js/script.js";
        ?>
    </script>
</body>
</html>