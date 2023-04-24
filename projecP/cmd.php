<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>produit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</head>


<body>
    <div id_client="container">
        <h2>ajouter commande</h2>
        <br>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

            <input[ type='checkbox' ]:hover + .mw-ui-button.mw-ui-quiet input[ type='checkbox' ]:hover + .mw-ui-button.mw-ui-quiet.mw-ui-progressive input[ type='checkbox' ]:hover + .mw-ui-button.mw-ui-quiet.mw-ui-destructive, .mw-ui-button.mw-ui-quiet:hover, .mw-ui-button.mw-ui-quiet.mw-ui-progressive:hover .mw-ui-button.mw-ui-quiet.mw-ui-destructive:hover>


                <label>id fournisseur </label>
                <input type="text" name="id_four" class="form-control mb-2" required autofocus>



                <label>id client</label>
                <input type="texte" name="id_client" class="form-control mb-2" required maxlength="15">


                <label>quantite </label>
                <input type="texte" name="quantite" class="form-control mb-2" required maxlength="15">



                <label>prix</label>
                <input type="texte" name="prix" class="form-control mb-2" required maxlength="15">


                <input type="submit" id_client="submit" name="submit1" value="ajouter">
                <input type="reset" value="annuler">


        </form>
    </div>
</body>

</html>
<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["submit1"])) {
        // Create connection
        $pass = "";
        $user = "root";
        $connecte = "mysql:host=localhost;dbname=projetp;charset=utf8;";

        $conn = new pdo($connecte, $user, $pass);

        if (empty($_POST["id_four"])) {
            echo "<div class='alert'>
  <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
  <strong>Danger!</strong> id_four produit est null please entre ce champ.
</div>";
        }
        if (empty($_POST["id_client"])) {
            echo "<div class='alert'>
    <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
    <strong>Danger!</strong> id_client produit est null please entre ce champ.
  </div>";
        }
        if (empty($_POST["quantite"])) {
            echo "<div class='alert'>
    <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
    <strong>Danger!</strong> id_client produit est null please entre ce champ.
  </div>";
        }
        if (empty($_POST["prix"])) {
            echo "<div class='alert'>
    <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
    <strong>Danger!</strong> id_client produit est null please entre ce champ.
  </div>";
        }


        $id_four = htmlspecialchars($_POST["id_four"]);
        $id_client = htmlspecialchars($_POST["id_client"]);
        $quantite = htmlspecialchars($_POST["quantite"]);
        $prix = htmlspecialchars($_POST["prix"]);

        if ($conn) {
            $sql = $conn->prepare("INSERT INTO cmd ( id_four , id_client,quantite,prix)
    VALUES (?,?,?,?)");
            $sql->execute(array($id_four, $id_client, $quantite, $prix));
            $sql = $conn->prepare("INSERT INTO facture (quantite)
    VALUES (?)");
             $sql->execute(array($quantite));
            // echo 'les données ete bien enregistre';

        }
        
    }
    header('location:/projet/pdf/invoice.php');
}

?>