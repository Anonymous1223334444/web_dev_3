<?php
$host = "localhost";
$uName = "project";
$pass = "1223334444";
$dbName = "web_project";

// Create connection
$conn = new mysqli($host, $uName, $pass, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['email']) && isset($_SESSION['prenom']) && $_SESSION["role"] === "apprenant") {
    $sql = "SELECT titre, photo, prix, categorie, id_formateur, description FROM cours";
    $result = $conn->query($sql);

    ?>
    <h2 class="cards-title">Parce que</h2>

    <div class="cards-container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sql2 = "SELECT CONCAT_WS(' ', prenom, nom) as name_formateur FROM formateur WHERE id = " . $row["id_formateur"];
                $result2 = $conn->query($sql2);
                if ($result2->num_rows > 0) {
                    while ($row2 = $result2->fetch_assoc()) {
                        ?>
                        <div class="card" style="border: none;"
                            data-titre="<?= $row["titre"] ?>"
                            data-prix="<?= $row["prix"] ?>"
                            data-categorie="<?= $row["categorie"] ?>"
                            data-description="<?= $row["description"] ?>"
                            data-name_formateur="<?= $row2["name_formateur"] ?>"
                            data-photo="<?= $row["photo"] ?>">
                            <img src="../public/uploads/cours/<?= $row["photo"] ?>" alt="">
                            <div class="title">
                                <p><?= $row["titre"] ?></p>
                                <p class="teacher"><?= $row2["name_formateur"] ?></p>
                                <div>
                                    <p class="price"><?= $row["prix"] ?> francs</p>
                                    <p class="categorie"><?= $row["categorie"] ?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
            }
        }
        ?>
    </div>

    <?php } elseif (isset($_SESSION['email']) && isset($_SESSION['prenom']) && $_SESSION["role"] === "administrateur") { 
            
            include "Admin/Admin.php";
        ?>

        <style>
            table, button {
                font-size: 150%;
            }
        </style>

    <?php } else{ 
        ?>
        <section class='hero'>
            <div class='hero_title'>
                <h2>Apprenez à votre rythme</h2>
                <p>Plongez dans l'expérience la plus immersive et<br>captivante pour maîtriser de nouveaux horizons.</p><br><br>
                <p>Entrez dans un univers d'opportunités infinies,<br>où tout se réalise en un seul clic.</p>
                <button id='btn_connect' onclick="window.location.href = 'http://localhost/web_dev_3/pages/Signup.php'">Commencer dès maintenant</button>
            </div>
        
            <div class='hero_img'>
                <div>
                    <img src='../public/img/code4.jpg' alt=''>
                </div>
        
                <div>
                    <img src='../public/img/code3.jpg' alt=''>
                </div>
        
                <div>
                    <img src='../public/img/code2.jpg' alt=''>
                </div>
            </div>
        </section>
        <?php
            $sql = "SELECT titre, photo, prix, categorie, id_formateur, description FROM cours";
            $result = $conn->query($sql);
        ?>
        <h2 class="cards-title">Les cours les plus populaires </h2>
        <div class="cards-container">
            <?php
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        $sql2 = "SELECT CONCAT_WS(' ', prenom, nom) as name_formateur FROM formateur WHERE id = " . $row["id_formateur"];
                        $result2 = $conn->query($sql2);
                        if ($result2->num_rows > 0) { 
                            while($row2 = $result2->fetch_assoc()) {

            ?>
            <div class="card" 
                data-titre="<?= $row["titre"] ?>"
                data-prix="<?= $row["prix"] ?>"
                data-categorie="<?= $row["categorie"] ?>"
                data-description="<?= $row["description"] ?>"
                data-name_formateur="<?= $row2["name_formateur"] ?>"
                data-photo="<?= $row["photo"] ?>"
                style="border: none;" data-lecture='http://localhost/web_dev_3/pages/content/course1/watch.php'>
                <img src="../public/uploads/cours/<?= $row["photo"] ?>" alt="">
                <div class="title">
                    <p><?= $row["titre"] ?></p>
                    <p class="teacher"><?= $row2["name_formateur"] ?></p>
                    <div>
                        <p class="price"><?= $row["prix"] ?> francs</p>
                        <p class="categorie"><?= $row["categorie"] ?></p>
                    </div> 
                </div>
            </div>

        <?php       }
                }

            }
        }
    }
        ?>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.card');

            cards.forEach(card => {
                card.addEventListener('click', function() {
                    const titre = card.getAttribute('data-titre');
                    const prix = card.getAttribute('data-prix');
                    const categorie = card.getAttribute('data-categorie');
                    const description = card.getAttribute('data-description');
                    const nameFormateur = card.getAttribute('data-name_formateur');
                    const photo = card.getAttribute('data-photo');

                    const queryString = `titre=${encodeURIComponent(titre)}&prix=${encodeURIComponent(prix)}&categorie=${encodeURIComponent(categorie)}&description=${encodeURIComponent(description)}&nameFormateur=${encodeURIComponent(nameFormateur)}&photo=${encodeURIComponent(photo)}`;

                    window.location.href = `http://localhost/web_dev_3/pages/course_detail.php?${queryString}`;
                });
            });
        });

    </script>



