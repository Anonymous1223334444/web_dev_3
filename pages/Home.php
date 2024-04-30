
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web_Dev_Projet</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <style>
        <?php include '../public/css/style.css' ?> 
    </style>

    <header class="header">
        <?php include 'includes/navigation.php';?>
        <button class="btn-mobile-nav">
            <ion-icon class="icon-mobile-nav" name="menu-outline"></ion-icon>
            <ion-icon class="icon-mobile-nav" name="close-outline"></ion-icon>
        </button>
    </header>

    <main class="container">
        <?php include 'Base.php';?>
    </main>

    <footer>
        <?php include 'includes/footer.php';?>
    </footer>

    <script type="text/javascript">
        <?php
            include "../public/js/script.js";
        ?>
    </script>
</body>
</html>