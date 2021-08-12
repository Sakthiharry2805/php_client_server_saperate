<?php
require '../config/database.php'; 
 
    $customer_email=$_REQUEST['customer_email'];
    
    $query = mysqli_query($con, "SELECT customer_email FROM customer WHERE customer_email = '$customer_email'");
    if(mysqli_num_rows($query) > 0)
    {
        $status=1;
        $messgae = "<div class='alert alert-danger'>Email is already exists.</div>";
    }else{
        $status=0;
        $messgae = "";
    }
    $res  = array('status'=>$status,'message'=>$messgae);
    echo json_encode($res);exit;