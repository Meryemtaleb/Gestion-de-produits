<?php session_start();include("_connexion.php"); // session active && importation connexion pdo
    $id = $_GET['id']; // Récupération de l'id
    $ps = $pdo->prepare("SELECT * FROM produit WHERE id=?"); // Prepare statement
    $params = array($id); // Associer les paramettres 
    $ps->execute($params); // exécution des paramettres
    $produit = $ps->fetch(); // Stocker résultat dans $produit
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include("_metaLink.php"); // Importation de metaLink.php ?>
        <title>Modifier un produit</title>
    </head>
    <body>
        <?php include("_navbar.php"); // Importation de navbar.php ?>
        <div class="container d-flex flex-column align-items-center mt-5">
            <h3 class="anim">Modifier un produit</h3>
            <!-- Envoie id via $_GET et les infos $_POST vers => updateProduit.php grace à ?id= -->
            <form action="updateProduit.php?id=<?php echo($produit['id']); ?>" method="post" class="col-8"
                    enctype="multipart/form-data"><!-- si envoie de fichier : enctype="multipart/form-data" -->
                <label for="id_categorie" class="form-label fw-bold">Catégorie</label>
                <select class="form-select animtop" id="id_categorie" name="categorie">
                    <option selected>Choisissez la catégorie du produit</option>
                    <option value="1">Ordinateur</option> <!-- donner les valeurs " -->
                    <option value="2">Tablette</option>
                    <option value="3">Mobile</option>
                </select>
                <!-- Input caché, seulement utilisé si rien a été sélectionné dans catégorie  -->
                <input type="hidden" name="catDef"value="<?php echo($produit['categorie']); ?>">
                <div class="mb-3 animtop">
                    <label for="nom" class="form-label fw-bold">Nom du produit</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nom" value="<?php echo($produit['nom']); ?>">     
                </div>
                <div class="mb-3 animtop">
                    <label for="id_prix" class="form-label fw-bold">Prix</label>
                    <input type="number" class="form-control" id="id_prix" name="prix"value="<?php echo ($produit['prix']); ?>">
                </div>
                <div class="mb-3 animtop">
                    <label for="stock" class="form-label fw-bold">Stock restant</label>
                    <input type="number" class="form-control" id="stock" name="stock"value="<?php echo ($produit['stock']); ?>">
                </div>
                <div class="mb-3 animtop">
                    <!-- Afficher apercue photo -->
                    <label for="id_photo" class="form-label fw-bold">Photo</label>
                    <input type="file" class="form-control" id="id_photo" name="photo">
                    <img src="images/<?php echo ($produit['photo']); ?>" width="100" height="100" alt="">
                </div>
                <button type="submit" class="btn btn-success mt-3 animtop">Enregistrer</button>
            </form>
        </div>
        
        <?php include("_script.php"); // Importation de script.php ?>
    </body>
</html>