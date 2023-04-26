<?php session_start();include("connexion.php"); // Session active && importation connexion pdo

// Récupération id envoyée par action="updateProduit.php" depuis la page  editProduit.php
$id=$_GET['id']; 

// Donner valeur defaut Si la categorie n'est pas choisit
if(isset($_POST['categorie']) && $_POST['categorie']== "Choisissez la catégorie du produit"){
    $categorie= $_POST['catDef'];
}
else {
    $categorie= $_POST['categorie'];
};

// Stockage des informations entrées dans le formulaire
$nom=$_POST['nom'];
$prix=$_POST['prix'];
$stock=$_POST['stock'];
$photo = $_FILES['photo']['name']; // stockage nom de la photo
$fichierTempo = $_FILES['photo']['tmp_name']; // stockage fichier tempo

// Si photo pas changée, ne pas traiter $photo
if ($photo == ""){
// Prepare statement : Respecter l'ordre entre la requete et les variables dans $params
$ps = $pdo->prepare("UPDATE `produit` SET categorie=?,id=?,nom=?, prix=?,stock=? WHERE id=?");
$params = array($categorie,$id,$nom,$prix,$stock, $id); // Associer les paramettres
$ps->execute($params);// Exécuter paramettres
// Redirection vers la page index.php + envoie d'un message flash via $_GET
header("location:index.php?message=Les informations du produit ont bien été modifié");
}
else{
move_uploaded_file($fichierTempo,'./images/'.$photo); // transfer de la photo
$ps = $pdo->prepare("UPDATE `produit` SET categorie=?,id=?,nom=?, prix=?,stock=?, photo=? WHERE id=?");
$params = array($categorie,$id,$nom,$prix,$stock,$photo, $id);
$ps->execute($params); // execution de la requete vers BD
// Redirection vers la page index.php + envoie d'un message flash via $_GET
header("location:index.php?message=Les informations du produit ont bien été modifié");
}





