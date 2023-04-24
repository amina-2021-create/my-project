<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>supprimer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" rel="stylesheet">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input[ type='checkbox' ]:hover + .mw-ui-button.mw-ui-quiet input[ type='checkbox' ]:hover + .mw-ui-button.mw-ui-quiet.mw-ui-progressive input[ type='checkbox' ]:hover + .mw-ui-button.mw-ui-quiet.mw-ui-destructive, .mw-ui-button.mw-ui-quiet:hover, .mw-ui-button.mw-ui-quiet.mw-ui-progressive:hover .mw-ui-button.mw-ui-quiet.mw-ui-destructive:hover>

            <h1>Suppression d'un produit </h1>
            <label for="ref">
                Entrez la reference du produit que vous voulez supprimer:
                <input type="number" name="ref" ref="ref">
            </label>
            <input type="submit" name="submite3" ref="submite3" value="delete">

    </form>
</body>

</html>
<?php
var_dump($_GET);
// Create connection
$pass = "";
$user = "root";
$connecte = "mysql:host=localhost;dbname=projetp;charset=utf8;";

$conn = new pdo($connecte, $user, $pass);
extract($_GET);
$suppressionClient = $conn->prepare("DELETE FROM produit WHERE ref = '$id';");
$suppressionClient->execute();
header('location:http://localhost/projet/template/gestion_produit.php');




?>