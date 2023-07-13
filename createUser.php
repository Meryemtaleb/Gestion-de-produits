<?php include("_connexion.php"); // Session active && importation connexion pdo

// stockage des informations entrées dans le formulaire
$pseudo=$_POST['pseudo'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$email=$_POST['email'];

// Hashage password
$mdp = password_hash(htmlspecialchars($_POST['mdp']), PASSWORD_DEFAULT);
$role=$_POST['role'];

// Prepare statement : Respecter l'ordre entre la requete et les variables dans $params
$ps = $pdo->prepare("INSERT INTO user(pseudo,nom,prenom,email,mdp,role) VALUES (?,?,?,?,?,?)");
$params = array($pseudo,$nom,$prenom,$email,$mdp,$role);

// Ouverture session après enregistrement
$user = $params;
session_start(); 
$_SESSION['PROFILE']['role'] = $role; 
$_SESSION['PROFILE']['pseudo'] = $pseudo;

$ps->execute($params); // execution de la requete avec BD
// Redirection vers la page ajouProduit.php + envoie d'un message flash via $_GET
header("location:index.php?message=Bienvenue ".$pseudo." votre compte a été crée");