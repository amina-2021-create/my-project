<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Shop </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>All stocks</h2>
        
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>date</th>
                    <th>numero</th>
                    <th>fournisseur</th>
                    <th>produits</th>
                    <th>quantite</th>
                    
                </tr>
            </thead>
            <tbody>
                  <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "projetp";

                    // Create connection
                    $connection = new mysqli($servername, $username, $password, $database);

                    //check connection
                    if ($connection->connect_error){
                        die("connection failed: " . $connection->connect_error);
                    }

                    //red all row from database table
                    $sql = "SELECT * FROM stock  ";
                    $result = $connection->query($sql);

                    if (!$result){
                          die("Invalid query: " . $connection->error);
                    }


                    //read data of each row
                    while($row = $result->fetch_assoc()){
                        echo "
                        <tr>
                           <td>$row[dates]</td>
                           <td>$row[num]</td>
                           <td>$row[id]</td>
                           <td>$row[ref]</td>
                           <td>$row[quantite]</td>
                          
                        <td>
  
                     
                        </td>
                      </tr>
                        ";
                    }


                  ?>
                  
              </tbody>
          </table>
    </div>



    
</body>
</html>