<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>supprimer</title>
       <!-- CSS only -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" >
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" rel="stylesheet" >
    
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input[ type='checkbox' ]:hover + .mw-ui-button.mw-ui-quiet input[ type='checkbox' ]:hover + .mw-ui-button.mw-ui-quiet.mw-ui-progressive input[ type='checkbox' ]:hover + .mw-ui-button.mw-ui-quiet.mw-ui-destructive, .mw-ui-button.mw-ui-quiet:hover, .mw-ui-button.mw-ui-quiet.mw-ui-progressive:hover .mw-ui-button.mw-ui-quiet.mw-ui-destructive:hover>

            <h1>Suppression d'un categorie </h1>
            <label for="categorie">
                Entrez le categorie que vous voulez supprimer:
                <input type="texte" name="categorie" ref="categorie">
            </label>
            <input type="submit" name="submite3" ref="submite3" value="delete">

    </form>
</body>

</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["submite3"])) {
        // Create connection
        $pass = "";
        $user = "root";
        $connecte = "mysql:host=localhost;dbname=projetp;charset=utf8;";

        $conn = new pdo($connecte, $user, $pass);
        if (isset($_POST['categorie'])) {
            if (!empty($_POST['categorie'])) {

                $categorie = htmlspecialchars($_POST['categorie']);

        //verifier est ce que le categorie en veut supprimer existe 

                $testId = $conn->prepare('SELECT * FROM categorie WHERE categorie = ?');
                $testId->execute(array($categorie));

                $nbLignes = $testId->rowCount();

                if ($nbLignes != 0) {

                    $suppressioncategorie = $conn->prepare('DELETE * FROM categorie WHERE categorie = ?');
                    $suppressioncategorie->execute(array($categorie));
                } else {
                    echo 'Ce categorie  n\'existe pas !!';
                }
            } else {
                echo 'Ce categorie  est non valable !!';
            }
        } else {                                                                                                                 
            echo 'Attention, Ce Champ est Obligatoire !!';
        }
    }
}

?>