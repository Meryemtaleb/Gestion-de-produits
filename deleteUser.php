<?php session_start();include("connexion.php"); // session active && importation connexion pdo
$pseudo = $_GET['pseudo']; // récupération du pseudo 
$p = $pdo->prepare("DELETE FROM user WHERE pseudo=?"); // Prepare statement requete
$params = array($pseudo); // Associer les paramettres
$p->execute($params);// exécution des paramettres
// Redirection vers la page index.php + envoie d'un message flash via $_GET
header("location:user.php?message=L'utilisateur a été supprimé");