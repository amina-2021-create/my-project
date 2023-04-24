<?php
    if (isset ($_GET["id"])) {
        $id= $_GET["id"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "projetp";

        //create connection
        $connection = new mysqli($servername, $username, $password, $database);

        $sql="DELETE FROM client WHERE id=$id";
        $connection->query($sql);
    }
 header("location: /projet/template/index.html");
 exit;
