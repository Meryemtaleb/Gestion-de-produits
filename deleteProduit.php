<?php session_start(); include("connexion.php"); // session active && importation connexion pdo
$id = $_GET['id']; // Récupération de l'id 
$p = $pdo->prepare("DELETE FROM produit WHERE id=?"); // Prepare statement requete
$params = array($id); // Associer les paramettres
$p->execute($params); // execution de la requete vers BD
// Redirection vers la page index.php + envoie d'un message flash via $_GET
header("location:index.php?message=Le produit a été supprimé");