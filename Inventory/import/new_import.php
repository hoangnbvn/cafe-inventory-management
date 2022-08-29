<!DOCTYPE html>
<html lang="en">
<head>
	<title> Add new product </title>
	<meta charset="utf-8"/>
	<meta name="description" content="add student to database"/>
</head>

<body>
	<h1>New Import</h1>

<?php
require_once("..\connection.php");
$con = pg_connect("host=$host port=5432 dbname='$db' user=$user password=$pass") or die ("could not connect to Server\n");
$sql_db="import";
session_start();
$numberImport=$_SESSION["count_product"];
$idpro=$_SESSION["idpro"];
$i=0;

while($i<$numberImport){
	$id="id".$i;
    $supplier="supplier";
    $manager="manager";
	
	if($_POST[$id]!=0){
		$import_query="SELECT nhap($_POST[$supplier],$idpro[$i],$_POST[$id],$_POST[$manager])";
		$results=pg_query($con,$import_query);
	}
	$i+=1;
}
$_SESSION['notification']="Nhập hàng vào kho thành công ";
header("location:import_product.php");

?>
</body>
</html>