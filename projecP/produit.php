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
    <div libelle="container">
        <h2>New product</h2>
        <br>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

            <input[ type='checkbox' ]:hover + .mw-ui-button.mw-ui-quiet input[ type='checkbox' ]:hover + .mw-ui-button.mw-ui-quiet.mw-ui-progressive input[ type='checkbox' ]:hover + .mw-ui-button.mw-ui-quiet.mw-ui-destructive, .mw-ui-button.mw-ui-quiet:hover, .mw-ui-button.mw-ui-quiet.mw-ui-progressive:hover .mw-ui-button.mw-ui-quiet.mw-ui-destructive:hover>

   
                <label>reference </label>
                <input type="number" name="ref" class="form-control mb-2" required autofocus>



                <label>libelle</label>
                <input type="texte" name="libelle" class="form-control mb-2" required maxlength="15">



                <label>prix unitaire</label>
                <input type="number" class="form-control mb-2" required name="prix_uni" maxlength="50">



                <label>quantite</label>
                <input type="number" class="form-control mb-2" required name="quantite" maxlength="50">


                <label>categorie</label>
                <input type="text" class="form-control mb-2" required name="categorie" maxlength="50">


                <input type="submit" libelle="submit" name="submit1" value="ajouter">
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

        if (empty($_POST["ref"])) {
            echo "<div class='alert'>
  <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
  <strong>Danger!</strong> ref produit est null please entre ce champ.
</div>";
        }
        if (empty($_POST["libelle"])) {
            echo "<div class='alert'>
    <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
    <strong>Danger!</strong> libelle produit est null please entre ce champ.
  </div>";
        }
        if (empty($_POST["prix_uni"])) {
            echo "<div class='alert'>
    <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
    <strong>Danger!</strong> prix_uni produit est null please entre ce champ.
  </div>";
        }
        if (empty($_POST["quantite"])) {
            echo "<div class='alert'>
    <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
    <strong>Danger!</strong> quantite produit est null please entre ce champ.
  </div>";
        }
        if (empty($_POST["categorie"])) {
            echo "<div class='alert'>
    <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
    <strong>Danger!</strong> categorie produit est null please entre ce champ.
  </div>";
        }


        $ref = htmlspecialchars($_POST["ref"]);
        $libelle = htmlspecialchars($_POST["libelle"]);


        $prix_uni = htmlspecialchars($_POST["prix_uni"]);
        $quantite = htmlspecialchars($_POST["quantite"]);
        $categorie = htmlspecialchars($_POST["categorie"]);


        if ($conn) {
            $sql = $conn->prepare("INSERT INTO produit ( ref , libelle	, prix_uni	, quantite , categorie)
    VALUES (?,?, ?, ? , ? )");
            $sql->execute(array($ref, $libelle, $prix_uni, $quantite, $categorie));

            // echo 'les données ete bien enregistre';

        }
    }
}

?>