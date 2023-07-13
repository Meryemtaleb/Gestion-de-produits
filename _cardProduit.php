<!-- Carte produit exportable-->
<div class="m-2 animtop">
    <div class="d-flex justify-content-center ">
        <img src='images\<?php echo($produit['photo'])?>' width="200px"/>
    </div>
    <div class="text-center">
        <h5 class="title text-uppercase fw-bold"><?php echo($produit['nom'])?></h5>
        <p class="">Prix : <?php echo($produit['prix'])?>€</p>
        <p class="">Stock : <?php echo($produit['stock'])?></p>
        <p class="">Categorie : <span class="text-capitalize"><?php echo($produit['cat'])?></span></p>
        </p>
        <!-- Restriction : si role = responsable-->
        <?php if (isset($_SESSION['PROFILE']) && $_SESSION['PROFILE']['role'] === 'responsable') { ?>
            <div class="d-flex justify-content-center">
                <!-- Envoie id du profil via $_GET vers => editProduit.php grace à ?id= -->
                <a class="btn btn-warning me-2"href="editProduit.php?id=<?php echo($produit['id']);?>">Modifier</a>
                <!-- 
                    Demande confirmation avant suppression avec la function confirm()
                    Envoie id du profil via $_GET vers => editProduit.php grace à ?id= 
                -->
                <a onclick="return confirm('Vous confirmez ?')"class="btn btn-danger"href="deleteProduit.php?id=<?php echo($produit['id'])?>">Supprimer</a>
            </div>
        <?php } ?>
    </div>
</div>
