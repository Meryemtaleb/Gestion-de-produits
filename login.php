<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include("metaLink.php"); // Importation de metaLink.php ?>
        <title>Connexion</title>
    </head>
    <body>
        <?php include("navbar.php"); ?>
        <div class="ncontainer d-flex flex-column align-items-center mt-5">
            <h2 class="animtop">Connexion</h2>
                <!-- Envoie des infos avec l'action $_Post vers => authentifier.php pour le traitement-->
                <form action="authentifier.php" method="post" class="col-8">
                <div class="mb-3  animtop">
                    <label for="exampleInputEmail1" class="form-label fw-bold">Pseudo</label>
                    <input name="pseudo" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3 animtop">
                    <label for="exampleInputPassword1" class="form-label fw-bold">Mot de passe</label>
                    <input name="mdp" type="password" class="form-control" id="exampleInputPassword1">
                </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
            </form>
        </div>
        <?php include("footer.php"); ?>
        <?php include("script.php"); // Importation de script.php ?>
    </body>
</html>