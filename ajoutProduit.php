<?php session_start();include("_connexion.php"); // Session active && importation connexion pdo ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include("_metaLink.php"); // Importation de metaLink.php ?>
        <title>Ajout de produit</title>
    </head>
    <body>
        <?php 
            include("_navbar.php"); // Importation de navbar.php
            // Afficher un message flash 
            if(isset($_GET['message'])) { 
                    $message = $_GET['message'];
                    echo "<h3 class='message text-center text-success animleft'>" . $message . "</h3>";
                }   
        ?>
        <div class=" container d-flex flex-column align-items-center mt-5">
            <h3  class="anim">Ajouter un produit</h3>
            <!-- 
                Envoie des infos avec l'action $_Post vers => createProduit.php pour le traitement
                Si envoie de fichier, ne pas oublierl'attribut => enctype="multipart/form-data"
            -->
            <form action="createProduit.php" enctype="multipart/form-data" method="post" class="col-8">
                <div class="mb-3 animtop">
                    <label for="categorie" class="form-label fw-bold">Catégorie</label>
                    <select class="form-select"  name="categorie">
                        <option selected>Choisissez une catégorie du produit</option>
                        <option value="1">Ordinateur</option>
                        <option value="2">Tablette</option>
                        <option value="3">Mobile</option>
                    </select>
                </div>
                <div class="mb-3 animtop">
                    <label for="nom" class="form-label fw-bold">Nom du produit</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nom">     
                </div>
                <div class="mb-3 animtop">
                    <label for="prix" class="form-label fw-bold">Prix</label>
                    <input type="text" class="form-control" id="prix"name="prix">
                </div>
                <div class="mb-3 animtop">
                    <label for="stock" class="form-label fw-bold">Stock restant</label>
                    <input type="number" class="form-control" id="stock" name="stock">
                </div>
                <div class="mb-3 animtop">
                    <label for="id_phoho" class="form-label fw-bold">Photo</label>
                    <input type="file" class="form-control" id="id_photo" name="photo">
                </div>
                <button type="submit" class="btn btn-success mt-3 animtop">Ajouter</button>
            </form>
        </div>

        <?php include("_script.php"); // Importation de script.php ?>
    </body>
</html>