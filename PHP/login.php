<?php
$pass=stripcslashes($_POST["pass"]);
$email=stripcslashes($_POST["email"]);
$pass=md5($pass);
// Create connection
$conn = new mysqli("localhost", "root", "", "fresh foods");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT `id`, `user_name`, `user_Type`, `Email` FROM `user` WHERE `Email`='$email'  AND `PASWORD`='$pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       setcookie("userId",  $row["id"], time() + (86400 * 30), "/");
       setcookie("userName",  $row["user_name"], time() + (86400 * 30), "/");
       setcookie("user_Type",  $row["user_Type"], time() + (86400 * 30), "/");
        echo "success";
    }
}else {
    echo "Wrong Details Try again";
}
$conn->close();
