<?php
    $host = "localhost";
    $dbuser = "vito";
    $dbpass = "vito123456789";
    $dbnAme = "FitManager";
    $conn = new mysqli($host, $dbuser, $dbpass, $dbnAme);
    if($conn->connect_error){
        die("connect to db failed");
    }
?>