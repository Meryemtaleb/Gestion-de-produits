<?php session_start();include("connexion.php"); // Session active && importation connexion pdo

// Traitement du formulaire de la page editUser.php via action="updateUser.php" 
// stockage des informations entrées dans le formulaire
$pseudo=$_GET['pseudo'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$email=$_POST['email'];

// si pas de role ou role = "Choisissez votre rôle" alors role = roleInitial 
// sinon role = role choisit
if (!isset($_POST['role'])|| $_POST['role'] === "Choisissez votre rôle"){$role = $_POST['roleInitial']; }
else {$role = $_POST['role'];}

// Prepare statement : Respecter l'ordre entre la request et les variables dans $params
$ps = $pdo->prepare("UPDATE user SET nom=?, prenom=?,email=?, role=? WHERE pseudo=?");
$params = array($nom,$prenom,$email,$role, $pseudo); // Associer les paramettres

$ps->execute($params); // execution de la requete vers BD

// Redirection vers la page user.php + envoie d'un message flash via $_GET
header("location:user.php?message=Les informations du compte ont bien été modifié");