<?php
session_start();
include("connection.php");



if (isset($SESSION['auth']))

{
    if (isset($_POST['placeOrderBtn']))
    {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $payment = mysqli_real_escape_string($conn, $_POST['payment']);

        if($name == "" || $email == "" || $phone == "" || $address == "" || $payment == "")
        {
            $_SESSION['message'] = "All Fields Are Mendatory";
            header('Location: ../checkout.php');
            esit(0);
        }
        $query = mysqli_query($conn, $query);
        $query = "INSERT INTO orders (name, email, phone, address, payment_mode) VALUES ('name', 'email', 'phone', 'address', 'payment')";
    }
}
else{
    echo "Hello";
}
?>