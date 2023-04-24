<?php
// Create connection
$pass = "";
$user = "root";
$connecte = "mysql:host=localhost;dbname=projetp;charset=utf8;";

$conn = new pdo($connecte, $user, $pass);


extract($_GET);


$modificationClient = $conn->prepare("SELECT * FROM produit where ref = '$id';");
$modificationClient->execute();
$prod = $modificationClient->fetch();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>modifier</title>
    <link rel="stylesheet" href="CSStest.css">
    <!-- JavaScript Bundle with Popper -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" rel="stylesheet">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div ref="container">
        <h1>modifier</h1>
        <br>

        <form action="modifier_prod.php" method="post">

            <input type="hidden" name="ref" value="<?= $prod['ref'] ?>" ref="ref" class="form-control mb-2" required autofocus>


            <label for="libelle"> nouveau libelle:</label>
            <input type="text" name="libelle" value="<?= $prod['libelle'] ?>" ref="libelle" class="form-control mb-2">


            <label for="prix_uni"> nouveau prix :</label>
            <input type="number" name="prix_uni" value="<?= $prod['prix_uni'] ?>" ref="prix_uni" class="form-control mb-2">



            <label for="quantite"> nouveau quantite:</label>
            <input type="number" name="quantite" value="<?= $prod['quantite'] ?>" ref="quantite" class="form-control mb-2">



            <label for="categorie"> la nouvelle categorie:</label>
            <input type="text" name="categorie" value="<?= $prod['categorie'] ?>" ref="categorie" class="form-control mb-2">

            <input type="submit" ref="submit" name="madifie1" value="Modifier">


        </form>
    </div>

</body>

</html>