<?php
setcookie("userName",  "user_name", time() + (86400 * 30), "/");
$user_id=$_COOKIE["userName"];

//Valuable
$Deli_comp_id=$_GET['Deli_comp_id'];
$payment_option=$_GET['payment_option'];
$Deli_date=$_GET['Deli_date'];
$Deli_loca=$_GET['Deli_loca'];
$Product_id=$_GET['Product_id'];

// Create connection
$conn = new mysqli("localhost", "root", "", "fresh foods");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//check if a user has an open cart available
function check_carts($conn,$user_id){
    $sql = "SELECT `Cart_Number` FROM `cart` WHERE `user_id`='$user_id' AND `status`=0 ";
    $result = $conn->query($sql);
// if user has a working cart number that not complete add to it if not create a new one
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            return $row["Cart_Number"];
        }
    } else {
        return "";
    }
}

//create a new cart
function set_cart($conn,$user_id,$Deli_comp_id,$payment_option,$Deli_date,$Deli_loca,$Product_id){
    $Cart_Number=rand(10, 10000);
    $sql = "INSERT INTO `cart`(`Cart_Number`, `user_id`, `purch_date`, `payment_option`, `Deli_comp_id`, `Deli_date`, `Deli_loca`, `status`) VALUES ('$Cart_Number','$user_id','NULL','$payment_option','$Deli_comp_id','$Deli_date','$Deli_loca','0')";
    if(check_cart_number($Cart_Number)==0){
        if ($conn->query($sql) === TRUE) {
            ads_to_cart($Product_id,$Cart_Number);
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }elseif (check_cart_number($Cart_Number)==1){
        set_cart($conn,$user_id,$Deli_comp_id,$payment_option,$Deli_date,$Deli_loca);
    }

}

//check if a cart number is available
function check_cart_number($Cart_Number,$conn){
    $sql = "SELECT `Cart_Number` FROM `cart` WHERE `Cart_Number`='$Cart_Number'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return 1;
    } else {
        return 0;
    }
}

function ads_to_cart($conn,$Cart_Number,$Product_id){

    $sql = "INSERT INTO `purchase`(`product_id`, `Cart_number`) VALUES ('$Cart_Number','$Product_id');";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}

if(empty(check_carts($conn,$user_id))){
    ads_to_cart($Product_id,check_carts($conn,$user_id));
}else{
    set_cart($conn,$user_id,$Deli_comp_id,$payment_option,$Deli_date,$Deli_loca);
}


$conn->close();
