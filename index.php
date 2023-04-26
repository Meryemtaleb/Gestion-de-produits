<?php session_start();
include("connexion.php"); // session active && importation connexion pdo 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("metaLink.php"); // Importation de metaLink.php 
    ?>
    <title>ITECH</title>
</head>

<body>
    <?php include("navbar.php"); // Importation de navbar.php 
    ?>
    
    <?php
    // Message flash
    if (isset($_GET['message'])) { // Si message trouvé
        $message = $_GET['message'];
        // Afficher le contenu du message  
        echo "<h3 class='message text-center text-success animleft'>" . $message . "</h3>";
    }
    ?>

    <div class="d-flex flex-column align-items-center ">
    <img src="images/1.png" width="300px"><!-- image logo -->
        <?php include("menuD.php"); // Importation du Dropdown pour le menu déroulant
        ?>
        <p class="fs-2 text-center text-capitalize anim">Tous les produits</p>
        <div class="col-10 d-flex flex-wrap justify-content-center">
            <?php
            // Afficher les valeurs trouvées dans la BD avec foreach via une requete SQL-->
            foreach ($pdo->query('SELECT `produit`.id, `produit`.nom, `categorie`.nom as cat,`produit`.prix, `produit`.stock, `produit`.photo 
                                        FROM `produit`, `categorie` where  `produit`.categorie = `categorie`.id') as $produit) : ?>
                <div class="border m-2" style="width: 250px">
                    <?php include("cardProduit.php"); // importation de la carte produit
                    ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php include("script.php"); // Importation de script.php 
    ?>
    <?php include("footer.php"); ?>
</body>

</html>