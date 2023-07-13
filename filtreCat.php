<?php session_start();include("_connexion.php"); // session active && importation connexion pdo ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include("_metaLink.php"); // Importation de metaLink.php ?>
        <title>Page d'accueil</title>
    </head>
    <body>
        <?php 
            include("_navbar.php"); // Importation de navbar.php
            if(isset($_GET['value'])){ // Si value est trouvée
                $value = $_GET['value']; // Atribuer value à $value 
            } else {
                $value= ""; //  sinon $value sera vide
            }
        ?>
        <div class="d-flex flex-column align-items-center mt-3">
            <img src="images/1.png" width="200px"><!-- image logo -->
                <?php  // include("menuD.php"); // importation menu déroulant ?>
                <!--
                    <p class="fs-2 text-center text-capitalize anim">
                        Afficher le nom de la catégorie  via une requete SQL
                        <?php echo $pdo->query('SELECT categorie.nom FROM categorie WHERE `categorie`.id='.$value)->fetchColumn();?>
                    </p>
                -->

                <div class="anim dropdown mb-2">
                    <button class="btn btn-lg bg-secondary text-light  anim text-capitalize dropdown-toggle" type="button" data-bs-toggle="dropdown" style="padding: 10px 100px">
                        <?php echo $pdo->query('SELECT categorie.nom FROM categorie WHERE `categorie`.id=' . $value)->fetchColumn(); ?>
                    </button>
                    <ul class="dropdown-menu text-center " style="padding: 10px 79px">
                        <!-- Envoie de value= en $_Get vers => filtreCat.php grace = ?value= -->
                        <li><a class="dropdown-item rounded" href="index.php">Tous les produits</a></li>
                        <li><a class="dropdown-item rounded" href="filtreCat.php?value=1">Ordinateur</a></li>
                        <li><a class="dropdown-item rounded" href="filtreCat.php?value=2">Tablette</a></li>
                        <li><a class="dropdown-item rounded" href="filtreCat.php?value=3">Mobile</a></li>
                    </ul>
                </div>


                <h2 class="text-center"></h2>
                <div class="col-9 d-flex flex-wrap justify-content-center">
            <?php
                // Afficher les valeurs trouvées dans la BD avec foreach via une requete SQL-->
                foreach ($pdo->query('SELECT `produit`.id, `produit`.nom, `categorie`.nom as cat,`produit`.prix, `produit`.stock, `produit`.photo 
                FROM `produit`, `categorie` where  `produit`.categorie = `categorie`.id AND `categorie`.id ='.$value) as $produit): 
            ?>
                <div class="border m-2" style="width: 250px">
                    <?php include("_cardProduit.php"); // importation de la carte produit?>
                </div>
            <?php endforeach;?>
        </div>
        
        <?php include("_script.php"); // Importation de script.php ?>
    </body>
</html>