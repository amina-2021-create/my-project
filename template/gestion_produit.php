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
        <h2>List of products</h2>

        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>reference</th>
                    <th>libelle</th>
                    <th>prix</th>
                    <th>quantite</th>
                    <th>categorie</th>

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
                if ($connection->connect_error) {
                    die("connection failed: " . $connection->connect_error);
                }

                //red all row from database table
                $sql = "SELECT * FROM produit";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }


                //read data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "
                        <tr>
                           <td>$row[ref]</td>
                           <td>$row[libelle]</td>
                           <td>$row[prix_uni]</td>
                           <td>$row[quantite]</td>
                           <td>$row[categorie]</td>
                        <td>
  
                            <a class='btn btn-primary btn-sm' href='/projet/projecP/Update_produit.php?id=$row[ref]'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='/projet/projecP/delete_produit.php?id=$row[ref]'>Delete</a>
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