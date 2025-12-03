<?php
    $host = "localhost";
    $dbuser = "vito";
    $dbpass = "vito123456789";
    $dbname = "SM";
    $testdb = "sport";
    $conn = mysqli_connect($host, $dbuser, $dbpass,$dbname);
    if(mysqli_select_db($conn, $testdb))
        echo "connect to sport db susccessfully";1

?> 