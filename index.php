<?php session_start();include("_connexion.php"); // Session active && importation connexion pdo ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include("_metaLink.php"); // Importation de metaLink.php ?>
        <title>Liste des Produits</title>
    </head>
    <body>
        <?php include("_navbar.php"); // Importation de navbar.php ?>
        <?php 
            // Message flash
            if(isset($_GET['message'])) { // Si message trouvé
                $message = $_GET['message'];
                // Afficher le contenu du message  
                echo "<h3 class='message text-center text-success animleft'>" . $message . "</h3>";
                }   
        ?>
        <div class="d-flex flex-column align-items-center mt-1">
            <img class="" src="images/1.png" width="200px"><!-- image logo -->
            <div class="anim dropdown mb-2">
                <button class="btn btn-lg bg-secondary text-light dropdown-toggle"  
                        type="button" data-bs-toggle="dropdown" style="padding: 10px 100px">
                    Catégorie
                </button>
                <ul class="dropdown-menu text-center "style="padding: 10px 79px" >
                    <!-- Envoie de value= en $_Get vers => filtreCat.php grace = ?value= -->
                    <li><a class="dropdown-item rounded"  href="index.php">Tous les produits</a></li>
                    <li><a class="dropdown-item rounded"  href="filtreCat.php?value=1">Ordinateur</a></li>
                    <li><a class="dropdown-item rounded"  href="filtreCat.php?value=2">Tablette</a></li>
                    <li><a class="dropdown-item rounded"  href="filtreCat.php?value=3">Mobile</a></li>
                </ul>
            </div>
                <p class="fs-2 text-center text-capitalize anim">Tous les produits</p>
            <div class="col-9 d-flex flex-wrap justify-content-center">
                <?php 
                    // Afficher les valeurs trouvées dans la BD avec foreach via une requete SQL-->
                    foreach ($pdo->query('  SELECT  `produit`.id, `produit`.nom, `categorie`.nom as cat,
                                                    `produit`.prix, `produit`.stock, `produit`.photo 
                                            FROM    `produit`, `categorie` 
                                            WHERE   `produit`.categorie = `categorie`.id') as $produit): 
                ?>
                    <div class="border m-2" style="width: 250px" >
                        <?php include("_cardProduit.php"); // importation de la carte produit?>
                    </div>
                <?php 
                    endforeach;
                ?>
            </div>
        </div>
        
        <?php include("_script.php"); // Importation de script.php ?>
    </body>
</html>