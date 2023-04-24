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
    <div dates="container">
        <h2>New Stock</h2>
        <br>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

            <input[ type='checkbox' ]:hover + .mw-ui-button.mw-ui-quiet input[ type='checkbox' ]:hover + .mw-ui-button.mw-ui-quiet.mw-ui-progressive input[ type='checkbox' ]:hover + .mw-ui-button.mw-ui-quiet.mw-ui-destructive, .mw-ui-button.mw-ui-quiet:hover, .mw-ui-button.mw-ui-quiet.mw-ui-progressive:hover .mw-ui-button.mw-ui-quiet.mw-ui-destructive:hover>

   
                <label>numero </label>
                <input type="number" name="num" class="form-control mb-2" required autofocus>



                <label>date</label>
                <input type="date" name="dates" class="form-control mb-2" required maxlength="15">



                <label>id fournisseur</label>
                <input type="number" class="form-control mb-2" required name="id" maxlength="50">



                <label>produit</label>
                <input type="text" class="form-control mb-2" required name="ref" maxlength="50">


                <label>quantite</label>
                <input type="text" class="form-control mb-2" required name="quantite" maxlength="50">


                <input type="submit" dates="submit" name="submit1" value="ajouter">
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

        if (empty($_POST["num"])) {
            echo "<div class='alert'>
  <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
  <strong>Danger!</strong> num produit est null please entre ce champ.
</div>";
        }
        if (empty($_POST["dates"])){
            echo "<div class='alert'>
    <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
    <strong>Danger!</strong> dates produit est null please entre ce champ.
  </div>";
        }
        if (empty($_POST["id"])) {
            echo "<div class='alert'>
    <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
    <strong>Danger!</strong> id produit est null please entre ce champ.
  </div>";
        }
        if (empty($_POST["ref"])) {
            echo "<div class='alert'>
    <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
    <strong>Danger!</strong> quantite produit est null please entre ce champ.
  </div>";
        }
        if (empty($_POST["quantite"])) {
            echo "<div class='alert'>
    <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
    <strong>Danger!</strong> categorie produit est null please entre ce champ.
  </div>";
        }


        $num = htmlspecialchars($_POST["num"]);
        $dates = htmlspecialchars($_POST["dates"]);


        $id = htmlspecialchars($_POST["id"]);
        $quantite = htmlspecialchars($_POST["ref"]);
        $categorie = htmlspecialchars($_POST["quantite"]);


        if ($conn) {
            $sql = $conn->prepare("INSERT INTO stock ( num , dates	, id , ref	, quantite )
    VALUES (?,?, ?, ? , ? )");
            $sql->execute(array($num, $dates, $id, $quantite, $categorie));

            // echo 'les données ete bien enregistre';

        }
    }
}

?>