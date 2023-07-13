<?php include("_connexion.php"); // importation connexion pdo
// Authentification :
$login = $_POST['pseudo']; // Récupération du pseudo tapé via le formulaire 
$pass = $_POST['mdp']; // Récupération du mdp tapé via le formulaire
$ps = $pdo->prepare("SELECT * FROM user WHERE pseudo=? AND mdp=?");// Prepare statement requete
$params = array($login, $pass); // Associer les paramettres
$ps->execute($params); // execution de la requete vers BD
if ($user = $ps->fetch()) { // ouverture session si correspondance données
    session_start();
    $_SESSION['PROFILE'] = $user;
    // Redirection vers la page index.php + envoie d'un message flash via $_GET
    header("location: index.php?message=Session active : ".$login);
} else {
    header("location: login.php"); // sinon rester sur la page login
}