<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "projetp";


//create connection
$connection = new mysqli($servername, $username, $password, $database);


$name = "";
$email ="";
$phone = "";
$adresse = "";

$errorMessage = "";
$successMessage = "";


if( $_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $adresse = $_POST["adresse"];

    do {
        if ( empty($name) || empty($email) || empty($phone) || empty($adresse)){
            $errorMessage = "All the fields are required";
            break;
        }

      // add new fournisseur to database
        $sql = "INSERT INTO fournisseur ( name , email, phone, adresse) " .
               "VALUES ('$name','$email','$phone', '$adresse')";
        $result = $connection->query($sql);


        if ($result) {
            $errorMessage = "Invalid query:" . $connection->error;
            break;
        }

      $name = "";
      $email ="";
      $phone = "";
      $adresse = "";

      $successMessage = "fournisseur added correctly";

     
      exit;


    }while (false);
 } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <div class="container my-5">
        <h2>New fournisseur</h2>

        <?php
           if ( !empty($errorMessage) ){
               echo"
               <div class='alert alert-warning alert- dismissible fade show' role='alert'>
                   <srtong>$errorMessage</strong>
                   <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";
           }
        ?>

        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="adresse" value="<?php echo $adresse; ?>">
                </div>
            </div>
              <?php
                if ( !empty($successMessage) ){
                    echo "
                    <div class 'row mb-3'>
                        <div class='offset-sm-3 col-sm-6'>
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                               <strong>$successMessage</strong>
                               <button type='button' class='btn-close data-bs-dismiss='alert' aria-label>
                            </div>
                        </div>
                    </div>
                    ";
                }
              ?>


            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type ="submit" class="btn btn-primary">submit</button>
            </div> 
            <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/myshop/fournisseur.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
           
    
</body>
</html>