<?php
require '../config/database.php';

$customer_id = $_POST['customer_id'];

if (
    empty($_POST['name']) || empty($_POST['age']) || empty($_POST['email']) ||
    empty($_POST['gender']) || empty($_POST['dob']) || empty($_POST['address'])
) {
    echo "Please fillout all required fields";
} else
    if (
    isset($_POST['name']) || isset($_POST['age']) || isset($_POST['email']) ||
    isset($_POST['gender']) || isset($_POST['dob']) || isset($_POST['address'])
) {
    $customer_name = $_POST['name'];
    $customer_age = $_POST['age'];
    $customer_email = $_POST['email'];
    $customer_gender = $_POST['gender'];
    $customer_dob = $_POST['dob'];
    $customer_address = $_POST['address'];

    $sql = "UPDATE customer SET customer_name ='{$customer_name}', customer_age='{$customer_age}', customer_email='{$customer_email}', 
            customer_gender='{$customer_gender}', customer_dob='{$customer_dob}', customer_address='{$customer_address}' 
            WHERE customer_id='{$customer_id}'";

    if (mysqli_query($con, $sql)) {
        echo "<div class='alert alert-success'>Successfully modify the user</div>";
        http_response_code(201);
        $url = "../Client/viewuser.php";
        echo '<script language="javascript">window.location.href ="' . $url . '"</script>';
    } else {
        http_response_code(422);
    }
}