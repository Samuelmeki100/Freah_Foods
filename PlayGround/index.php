<!DOCTYPE html>
<?php
  session_start();
	//connection valiable
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "fresh foods";


	// Create connection
	function SQL_Connection($servername,$username,$password,$dbname){
		$conn = new mysqli($servername, $username, $password, $dbname);
		
		// Check connection
		if ($conn->connect_error) {
			return die("Connection failed: " . $conn->connect_error);
		}
		return $conn;
	}
	

?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Planner</title>
		<!-- CSS only -->
		<link rel="stylesheet" href="CSS/bootstrap-4.6.0-dist/css/bootstrap.css"  crossorigin="anonymous">
		<link rel="stylesheet" href="CSS/main.css">
		<link rel="stylesheet" href="CSS/W3CSS.css">
		<script src="java_script/jquery-3.6.0.js"  crossorigin="anonymous"></script>
		<script src="https://kit.fontawesome.com/cdd144dc35.js" crossorigin="anonymous"></script>
		<script src="Java_script/tricks.js"></script>
	</head>
	<body>
		<div class="w3-white w3-padding notranslate" style="font-family: Arial, Helvetica, sans-serif;">
		<header class="header">
		  <h2>Fresh Foods</h2>
		</header>

		<section class="section">
		  <nav class=" nav" style="visibility: visible;">
			<ul>
			  <li><a href="javascript:void(0)">Vegitables</a></li>
			  <li><a href="javascript:void(0)">Live Stock</a></li>
			  <li><a href="javascript:void(0)">Fluets</a></li>
			</ul>
		  </nav>
		  
		  <article class="article">
			<h1>London</h1>
			<p>London is the capital city of England. It is the most populous city in the  United Kingdom, with a metropolitan area of over 13 million inhabitants.</p>
			<p>Standing on the River Thames, London has been a major settlement for two millennia, its history going back to its founding by the Romans, who named it Londinium.</p>
		  </article>
		</section>

		<footer class="footer"> 
		  <p>Footer</p>
		</footer>
		</div>
	
	<h4> Product_type</h4>
	<p><?php Get_by_type(2,SQL_Connection($servername,$username,$password,$dbname)) ?></p>
	
	<h4>farmer</h4>
	<p><?php Get_by_farmer(1,SQL_Connection($servername,$username,$password,$dbname)) ?></p>
	
	<h4>User Details</h4>
	<p><?php login("samuel","1234",1,SQL_Connection($servername,$username,$password,$dbname)); ?></p>
	
	</body>
	
</html>

<?php

//get products by type of product
function Get_by_type($Type_ID,$conn){
	$sql = "SELECT product.id, product.name, product.price FROM product_type INNER JOIN product ON product_type.id = product.Product_type WHERE (((product_type.id)=$Type_ID)); ";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
		echo "id: " . $row["id"]. " - Name: " . $row["name"]. "  price:  " . $row["price"]. "<br>";
	  }
	}else {
	  echo "0 results";
	}
	$conn->close();
}


//get what all the products that are sold by a farmer
function Get_by_farmer($farmer_ID,$conn){
	 $sql = "SELECT product.id, product.name, product.price FROM `user` INNER JOIN (product INNER JOIN farmer_Product ON product.id = farmer_Product.product_id) ON user.id = farmer_Product.farmer_id WHERE (user.id=1); ";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
		echo "Product id: " . $row["id"]. " -Product Name: " . $row["name"]. "  price:  " . $row["price"]. "<br>";
	  }
	}else {
	  echo "0 results";
	}
	$conn->close();
}


//Login to Application
function login($userna,$UserPs,$userty,$conn){
	
	$userna=stripcslashes($userna);
    $UserPs=stripcslashes($UserPs);
    $UserPs=md5($UserPs);
	
	$sql = "SELECT `id`, `user_name`, `user_Type`, `Email` FROM `user` WHERE `user_name`='$userna'  AND `PASWORD`='$UserPs' AND `user_Type`='$userty'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
		  $_SESSION["ID"] = $row["id"];
		echo "id: " . $row["id"]. " - Name: " . $row["user_name"]. "  user_Type:  " . $row["user_Type"]. "<br>";
	  }
	}else {
	  echo "Wrong Details Try agin";
	}
	$conn->close();
}

//Creat an Account With the application