<?php
require '../config/database.php';

// $id = isset($_GET['customer_id']) ? (int) $_GET['customer_id'] : 0;
$page=$_GET["page"];
$sql = "SELECT * FROM customer WHERE customer_id =".$_GET["customer_id"];
if(mysqli_query($con,$sql))
{ 
    $result = mysqli_query($con,$sql);
    http_response_code(201);
}
else{
    http_response_code(422);
}