<!DOCTYPE html>
<html lang="en">
<head>
	<title> Add new product </title>
	<meta charset="utf-8"/>
	<meta name="description" content="add student to database"/>
</head>

<body>
	<h1>Add a new student</h1>

<?php
require_once("D:\\xampp\\htdocs\\Inventory\\connection.php");
$con = pg_connect("host=$host port=5432 dbname='$db' user=$user password=$pass") or die ("could not connect to Server\n");

$id=$_POST["idprod"];
$name=$_POST["name"];
$unit=$_POST["unit"];
$price=$_POST["price"];


$sql_table="product";
$noti="";

$query_check_id ="SELECT COUNT(*) AS count FROM $sql_table WHERE id=$id ";
$results=pg_query($con,$query_check_id);
$check_id_exists=pg_fetch_object($results);

if($check_id_exists->count==0){
	$query="INSERT INTO $sql_table (id,name,unit,price,vat) VALUES ('$id', '$name', '$unit', '$price','0.1')";
	$result = pg_query($con, $query);
	if ($result) {
		$noti = "Nhập nguyên liệu mới vào kho thành công";
	} else {
		$noti = "Xảy ra lỗi trong quá trình thực hiện";
	}		
}
else{
	$noti="Lỗi! ID đã được sử dụng. Hãy chọn 1 ID khác";
}

session_start();
$_SESSION['notification'] = $noti;
$_SESSION['idpro'] = $id;
$_SESSION['name'] = $name;
$_SESSION['unit'] = $unit;
$_SESSION['price'] = $price;
pg_close($conn);

header("location:add_product.php");	
?>
</body>
</html>