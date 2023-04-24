<!DOCTYPE html>
<html>

<head>
    <title>categorie </title>
    <link rel="stylesheet" hid="test.css/css/master.css">
     <!-- CSS only -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <!-- JavaScript Bundle with Popper -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" rel="stylesheet" >
    
</head>


<body>
    <div description ="container">
        <h1>categorie</h1>
        <br>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

            <input[ type='checkbox' ]:hover + .mw-ui-button.mw-ui-quiet input[ type='checkbox' ]:hover + .mw-ui-button.mw-ui-quiet.mw-ui-progressive input[ type='checkbox' ]:hover + .mw-ui-button.mw-ui-quiet.mw-ui-destructive, .mw-ui-button.mw-ui-quiet:hover, .mw-ui-button.mw-ui-quiet.mw-ui-progressive:hover .mw-ui-button.mw-ui-quiet.mw-ui-destructive:hover>

                
                <label>categorie </label>
                <input type="texte" name="categorie" class="form-control mb-2" required autofocus>
                


                <label>description </label>
                <input type="texte" name="description" class="form-control mb-2" required maxlength="15">
                


                <input type="submit" description ="submit" name="submit1" value="ajouter">
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

        if (empty($_POST["categorie"])) {
            echo "<div class='alert'>
  <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
  <strong>Danger!</strong> categorie categorie  est null please entre ce champ.
</div>";
        }
        if (empty($_POST["description "])) {
            echo "<div class='alert'>
    <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
    <strong>Danger!</strong> 
  </div>";
        }



        $categorie = htmlspecialchars($_POST["categorie"]);
        $description  = htmlspecialchars($_POST["description"]);




        if ($conn) {
            $sql = $conn->prepare("INSERT INTO categorie ( categorie, description )
    VALUES (?,?)");
            $sql->execute(array($categorie, $description ));

             echo 'le categorie ete bien ajouter';

        }
    }
}

?>