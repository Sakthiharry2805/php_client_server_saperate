<?php

require_once '../config/database.php';

// $id = mysqli_real_escape_string($con,$_REQUEST['customer_id']);
	$sql = "DELETE FROM customer WHERE customer_id=".$_POST["customer_id"];
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-success'>Successfully delete the user</div>";
        // $url="../Client/viewuser.php";
        //         echo '<script language="javascript">window.location.href ="'.$url.'"</script>';
        http_response_code(201);
    }
    else{
        http_response_code(422);
    }