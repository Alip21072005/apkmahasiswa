<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "dbprodimhs";
$conn   = mysqli_connect($host, $user, $pass, $dbname)
    or die("Gagal terkoneksi ke database");
