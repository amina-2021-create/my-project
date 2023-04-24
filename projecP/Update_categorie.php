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

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input[ type='checkbox' ]:hover + .mw-ui-button.mw-ui-quiet input[ type='checkbox' ]:hover + .mw-ui-button.mw-ui-quiet.mw-ui-progressive input[ type='checkbox' ]:hover + .mw-ui-button.mw-ui-quiet.mw-ui-destructive, .mw-ui-button.mw-ui-quiet:hover, .mw-ui-button.mw-ui-quiet.mw-ui-progressive:hover .mw-ui-button.mw-ui-quiet.mw-ui-destructive:hover>

                <label for="ref">Entrez le categorie que vous voulez modifier:</label>
                <input type="texte" name="categorie" ref="ref" class="form-control mb-2" required autofocus>


                <label for="ref"> le nouveau description:</label>
                <input type="text" name="description" ref="description" class="form-control mb-2">




                <input type="submit" ref="submit" name="madifie1" value="Modifier">


        </form>
    </div>

</body>

</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["madifie1"])) {
        // Create connection
        $pass = "";
        $user = "root";
        $connecte = "mysql:host=localhost;dbname=projetp;charset=utf8;";

        $conn = new pdo($connecte, $user, $pass);



        if (isset($_POST['categorie']) && isset($_POST['description'])) {
            if (!empty($_POST['categorie']) && !empty($_POST['description'])) {

                $categorie = htmlspecialchars($_POST['categorie']);
                $description = htmlspecialchars($_POST['description']);




                $modificationClient = $conn->prepare("UPDATE categorie SET description = ?   WHERE categorie = ?");

                $modificationClient->execute(array(

                    $description,
                    $categorie
                ));
            } else {
                echo 'Ce categorie n \'existe pas !!';
            }
        } else {
            echo 'Cet categorie est non valable !!';
        }
    } else {
        echo 'Attention, Tous Les Champs Sont Obligatoires !!';
    }
}



?>