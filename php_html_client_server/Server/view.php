<?php
require_once '../config/database.php';

// $sql 	= "SELECT * FROM customer ";
// $result = mysqli_query($con,$sql);

    $limit = 3;
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	$start = ($page - 1) * $limit;
	$sql="SELECT * FROM customer LIMIT $start, $limit";
	// $customers = $result->fetch_all(MYSQLI_ASSOC);
    $result = mysqli_query($con,$sql);

	$result1 = $con->query("SELECT count(customer_id) AS customer_id FROM customer");
	$custCount = $result1->fetch_all(MYSQLI_ASSOC);
	$total = $custCount[0]['customer_id'];
	$pages = ceil( $total / $limit );

	$Previous = $page - 1;
	$Next = $page + 1;
    if($page == $pages){
        $Next = 1;
     $Next = ($Next);
        }
    if($page == 1){
        $Previous = $pages;
     $Previous = ($Previous);
        }