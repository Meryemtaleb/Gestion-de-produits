<?php session_start();include("_connexion.php"); // session active && importation connexion pdo
    $pseudo = $_GET['pseudo']; // Récupération du pseudo
    $ps = $pdo->prepare("SELECT * FROM user WHERE pseudo=?"); // Prepare statement
    $params = array($pseudo); // Associer les paramettres 
    $ps->execute($params); // Exécuter paramettres
    $user = $ps->fetch(); // Stocker résultat dans $user
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include("_metaLink.php"); // Importation de metaLink.php ?>
        <title>Modifier les informations</title>
    </head>
    <body>
    <?php include("_navbar.php"); // Importation de navbar.php ?>
        <div class="container d-flex flex-column align-items-center mt-5">
            <h3 class="anim">Modifier les informations</h3>
            <!-- Envoie du pseudo en $_GET via ?pseudo= && des infos $_POST vers => updateUser.php  -->
            <form action="updateUser.php?pseudo=<?php echo ($user['pseudo']);?>" method="post" class="col-8">
                <div class="mb-3 animtop">
                    <p class="fs-1 text-success "><?php echo ($user['pseudo']); ?></p>
                </div>
                <div class="mb-3 animtop">
                    <label for="nom" class="form-label fw-bold">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom"value="<?php echo ($user['nom']); ?>">
                </div>
                <div class="mb-3 animtop">
                    <label for="prenom" class="form-label fw-bold">Prénom</label>
                    <input type="text" class="form-control" id="prenom"name="prenom"value="<?php echo ($user['prenom']); ?>">
                </div>
                <div class="mb-3 animtop">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input type="email" class="form-control" id="email" name="email"value="<?php echo ($user['email']); ?>">
                </div>
                <!-- Cacher le role initial -->
                <input type="hidden" class="form-control" id="email" name="roleInitial"value="<?php echo ($user['role']); ?>">
                <?php 
                    // Si Role = responsable, alors donner le choix pour le role
                    if ($_SESSION['PROFILE']['role'] === 'responsable') { 
                ?>   
                <div class="mb-3 animtop">
                    <label for="role" class="form-label fw-bold">Rôle</label>
                    <select class="form-select"  name="role" value="<?php echo ($user['role']); ?>">
                        <option selected>Choisissez le rôle</option>
                        <option value="responsable">Responsable</option>
                        <option value="employe">Employé</option>
                    </select>
                </div>
                <?php } ?> 
                <button type="submit" class="btn btn-success mt-3 animtop">Enregistrer</button>
            </form>
        </div>
        
        <?php include("_script.php"); // Importation de script.php ?>
    </body>
</html>