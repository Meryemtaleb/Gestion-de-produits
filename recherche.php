<?php session_start();include("_connexion.php"); // Session active && importation connexion pdo ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include("_metaLink.php"); // Importation de metaLink.php ?>
        <title>Recherche</title>
    </head>
    <body>
        <?php 
            include("_navbar.php"); // Importation de navbar.php
            if(isset($_POST['recherche'])){ // Si submit $_POST de la recherche
                $req = $_POST['recherche']; // stocker valeur tapé dans $req
            } else {
                $req = "";
            }
        ?>
        <div class="d-flex flex-column align-items-center mt-3">
            <p class="fs-2 animleft"> Recherche : 
                <span class="text-success">
                    <?php 
                        echo($req);// Afficher la mot recherché
                        if($req==""){echo"vide";} // Si recherche vide afficher "vide"
                    ?>
                </span>
            </p>
            <div class="col-9 d-flex flex-wrap justify-content-center">
                <?php 
                if($req!=""){
                    // Afficher les valeurs trouvées dans la BD avec foreach
                    foreach ($pdo->query('  SELECT  `produit`.id, `produit`.nom, `categorie`.nom as cat,
                                                    `produit`.prix, `produit`.stock, `produit`.photo 
                                            FROM    `produit`, `categorie` 
                                            WHERE   `produit`.categorie = `categorie`.id 
                                            AND     `produit`.nom LIKE "%'.$req.'%"') as $produit): ?>
                        <div class="border m-2" style="width: 250px" >
                            <?php include("_cardProduit.php"); // importation de la carte produit?>
                        </div>
                <?php 
                    endforeach;}
                ?>
            </div>
        </div>

        <?php include("_script.php"); // Importation de script.php ?>
    </body>
</html>