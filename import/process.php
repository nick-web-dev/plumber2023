<?php

//process.php
include ('config.php');
// $connect = new PDO("mysql:host=localhost; dbname=callplumber", "root", "");

$query = "SELECT * FROM tbl_sample";

$statement = $connect->prepare($query);

$statement->execute();

echo $statement->rowCount();

?>