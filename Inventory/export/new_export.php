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
require_once("D:\\xampp\\htdocs\\Inventory\\connection.php");
$con = pg_connect("host=$host port=5432 dbname='$db' user=$user password=$pass") or die ("could not connect to Server\n");
$sql_db="import";
session_start();
$numberExport=$_SESSION["count_product"];
$idpro=$_SESSION["idpro"];
$i=0;

while($i<$numberExport){
	$id="id".$i;
	$manager="manager";
    $shift="shift";
	if($_POST[$id]!=0){
		$export_query="SELECT export_shift($idpro[$i],$_POST[$id],'$_POST[$shift]',$_POST[$manager])";
		$results=pg_query($con,$export_query);
        
	}
	$i+=1;
}
$_SESSION['notification']="Xuất Hàng thành công";
header("location:export_product.php");

?>
</body>
</html>