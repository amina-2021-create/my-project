<?php

// Create connection
$pass = "";
$user = "root";
$connecte = "mysql:host=localhost;dbname=projetp;charset=utf8;";

$conn = new pdo($connecte, $user, $pass);


extract($_POST);


$modificationClient = $conn->prepare("UPDATE produit 
                                        SET libelle = ? ,
                                        quantite = ? ,
                                        categorie = ? ,
                                        prix_uni = ?   
                                        WHERE ref = ?");

$modificationClient->execute(array(

    $libelle,
    $quantite,
    $categorie,
    $prix_uni,
    $ref
));
header('location:http://localhost/projet/template/gestion_produit.php');
