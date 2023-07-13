<?php session_start();include("_connexion.php"); // session active && importation connexion pdo
    $req = "SELECT * FROM user"; // requete
    $ps = $pdo->prepare($req); // Prepare statement requete
    $ps->execute(); // Exécution de la request vers la BD
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include("_metaLink.php"); // Importation de metaLink.php ?>
        <title>Liste des utilisateurs</title>
    </head>
    <body>
        <?php 
            include("_navbar.php"); // Importation de navbar.php
            // Message flash
            if(isset($_GET['message'])) { // Si message trouvé
                $message = $_GET['message'];
                // Afficher le contenu du message 
                echo "<h3 class='message text-center text-success animleft'>" . $message . "</h3>";
                }   
        ?>
        <div class=" card container mt-3">
                <h2 class="text-center anim">La liste des utilisateurs</h2>
            <div class="card-body">
                <table class="table ">
                    <thead>
                        <tr>
                            <th>Pseudo</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Rôle</th> 
                            <!-- Restriction role responsable -->
                            <?php if ($_SESSION['PROFILE']['role'] === 'responsable') { ?>                           
                                <th>Modifier</th>                            
                                <th>Supprimer</th>                            
                            <?php }?> 
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Afficher les valeurs trouvées dans la BD avec WHILE --->
                        <?php while ($user = $ps->fetch()) {?>
                            <tr class="animleft">
                                <td><?php echo($user['pseudo'])?></td>
                                <td><?php echo($user['nom'])?></td>
                                <td><?php echo($user['prenom'])?></td>
                                <td><?php echo($user['email'])?></td>
                                <td><?php echo($user['role'])?></td>
                                <!-- Restriction role responsable -->
                                <?php if ($_SESSION['PROFILE']['role'] === 'responsable') { ?> 
                                    <td>
                                        <!-- Envoie pseudo du profil via $_GET vers => editUser.php grace à ?pseudo= -->
                                        <a class="btn btn-success" href="editUser.php?pseudo=<?php echo ($user['pseudo']) ?>">Modifier </a>
                                    </td>
                                    <td>
                                        <!-- 
                                            Demande confirmation avant suppression avec la function confirm()
                                            Envoie id du profil via $_GET vers => editUser.php grace à ?pseudo= 
                                        -->
                                        <a class="btn btn-danger" onclick = "return confirm('Êtes vous sûr ?');"
                                            href="deleteUser.php?pseudo=<?php echo($user['pseudo'])?>"> Supprimer </a>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                        <div class="d-flex justify-content-center">
                            <!-- Envoie le pseudo du profil via $_GET vers => editUser.php grace à ?pseudo= -->
                            <a class="btn btn-success animtop" href="editUser.php?pseudo=<?php echo($_SESSION['PROFILE']['pseudo'])?>">Modifier mes infos</a>
                        </div>
                </table>
            </div>
        </div>

        <?php include("_script.php"); // Importation de script.php ?>
    </body>
</html>