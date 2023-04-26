<?php include("connexion.php"); // Session active && importation connexion pdo

// stockage des informations entrées dans le formulaire
$categorie = $_POST['categorie'];
$nom = $_POST['nom'];
$prix = $_POST['prix'];
$stock = $_POST['stock'];
$nomPhoto = $_FILES['photo']['name'];
$fichierTempo = $_FILES['photo']['tmp_name'];
move_uploaded_file($fichierTempo, './images/'.$nomPhoto);// transfer de la photo
// Prepare statement : Respecter l'ordre entre la requete et les variables à éxécuter
$pdo->prepare("INSERT INTO produit(categorie,nom, prix, stock, photo) VALUES(?,?,?,?,?)")
    ->execute([$categorie,$nom, $prix, $stock, $nomPhoto]); // execution de la requete vers BD
// Redirection vers la page ajouProduit.php + envoie d'un message flash via $_GET
header("location:ajoutProduit.php?message=Produit ajouté avec succès");






