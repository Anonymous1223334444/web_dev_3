<?php
    session_start();
    
    include 'utils/Util.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>  
    <style>
        <?php
            include '../public/css/navigation.css';
        ?>
    </style>
    
    <nav class="main-nav">
        <a href="/web_dev_3/pages/Home.php">
            <h2 class="logo">skillsUpNow</h2>
        </a>
        <ul class="main-nav-list">
            <form action="reussi.php" class="search-bar main-nav-link">
                <input type="text" placeholder="Faites une recherche">
                <button><img src="../public/img/search.png" alt="recherche"></button>
            </form>
            <li>
                <div class="dropdown">
                    <span>Catégorie</span>
                    <div class="dropdown-content">
                        <a href="#">Design</a>
                        <a href="#">Architecture</a>
                        <a href="#">Marketing</a>
                        <a href="#">Développement web</a>
                        <a href="#">Mathématiques</a>
                        <a href="#">Physique</a>
                        <a href="#">Communication</a>
                        <a href="#">Développement Personnel</a>
                        <a href="#">Cuisine</a>
                    </div>
                </div>
            </li>
            
            
            <?php
                if(isset($_SESSION['email']) && isset($_SESSION['prenom'])) {
            ?>
            <li>
                <div class='dropdown'>
                        <strong class='prenom'>Bonjour <i><?= $_SESSION['prenom'] ?></i> <i class="fa-solid fa-chevron-down"></i></strong>
                    <div class='dropdown-content'>
                        <a href='#'>Tableau de bord</a>
                        <a href='#'>Mes certificats</a>
                        <a href='#'>Mes cours</a>
                        <a href='#'>Mes évolutions</a>
                        <a href="Logout.php">Se deconnecter</a>
                    </div>
                </div>
            </li>
            <li><a href="#" style="display: flex; justify-content: center;">Forum</a></li>
            <li><a href="#">Noter la plateforme</a></li>
            <?php } else{
                echo "<li><button class='login main-nav-link' id='btn_connect'>Se connecter</button></li>
                <li><button class='signup main-nav-link' id='btn_create'>Créer un compte</button></li>
                <li>
                <a class='main-nav-link' href='#'>Devenir Formateur</a>
            </li>";    
        }?>
        </ul>   
    </nav>  

    

    </body>
</html>