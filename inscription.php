<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include("metaLink.php"); // Importation de metaLink.php ?>
        <title>Inscription</title>
    </head>
    <body>
        <?php include("navbar.php"); // Importation de navbar.php?>
        <div class=" container d-flex flex-column align-items-center mt-5">
            <h2 class="animtop ">Inscription</h2>
            <!-- Envoie des infos avec l'action $_Post vers => createUser.php pour le traitement-->
            <form action="createUser.php" method="post" class="col-8"  enctype="multipart/form-data">
                <div class="mb-3 animtop">
                    <label for="pseudo" class="form-label fw-bold">Pseudo</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="pseudo">
                </div>
                <div class="mb-3 animtop">
                    <label for="nom" class="form-label fw-bold">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom">
                </div>
                <div class="mb-3 animtop">
                    <label for="prenom" class="form-label fw-bold">Prénom</label>
                    <input type="text" class="form-control" id="prenom"name="prenom">
                </div>
                <div class="mb-3 animtop">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3 animtop">
                    <label for="mdp" class="form-label fw-bold">Mot de passe</label>
                    <input type="password" class="form-control" id="mdp" name="mdp">
                </div>
                <div class="mb-3 animtop">
                    <label for="id_phoho" class="form-label fw-bold">Photo</label>
                    <input type="file" class="form-control" id="id_photo" name="photo" >
                </div>
                <input type="hidden" class="form-control" id="email" name="role"value="employe">
                <button type="submit" class="btn btn-success animtop mt-3">S'inscrire</button>

            </form>
        </div>
        <?php include("footer.php"); ?>
        <?php include("script.php"); // Importation de script.php ?>
    </body>
</html>