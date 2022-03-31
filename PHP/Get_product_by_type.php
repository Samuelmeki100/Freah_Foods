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

error_reporting(E_ALL);
ini_set('display_errors', 1);
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode("{\"limit\":10}", false);
$Type_ID = json_decode($_GET["x"], false);

$conn = new mysqli("localhost", "root", "", "fresh foods");
$stmt = $conn->prepare("SELECT product.id, product.name, product.price FROM product_type INNER JOIN product ON product_type.id = product.Product_type WHERE (((product_type.id)=$Type_ID))  LIMIT ?");
$stmt->bind_param("s", $obj->limit);
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);