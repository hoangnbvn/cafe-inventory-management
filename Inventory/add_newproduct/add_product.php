<!DOCTYPE html>
<html lang="en">
<head>
	<title> Add now product </title>
	<meta charset="utf-8"/>
	<meta name="description" content="add student to database"/>
	<script src="add_product.js"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="desgin.css">

	<style>
body,h1,h5 {font-family: "Raleway", sans-serif}
body, html {height: 100%}
.bgimg {
  background-image: url('https://www.ivyboarding.com/w3template/w3images/onepage_restaurant.jpg');
  min-height: 100%;
  background-position: center;
  background-size: cover;
}
</style>

</head>

<body>

<div class="bgimg w3-display-container w3-text-white">
  
  <div class="w3-display-topleft">
    <p><img src="..\logocaphe.png" alt="logo" width="300px" height="100px"/></p>
  </div>

  <nav class=" w3-container w3-padding-24 w3-large">
  	<p><a href="..\warning\waring.php" class="w3-button w3-black">Gợi ý</a></p>
    <p><a href="..\import\import_product.php" class="w3-button w3-black">Nhập Hàng</a></p>
    <p><a href="..\export\export_product.php" class="w3-button w3-black">Xuất Hàng</a></p>
    <p><a href="add_product.php" class="w3-button w3-black">Nguyên liệu mới</a></p>
    <p><a href="..\select_product\select_product.php" class="w3-button w3-black">Kho Hàng</a></p>
    <p><a href="..\menu.php" class="w3-button w3-black">Trang chủ</a></p>
</nav>

<div class=" w3-modal-content " id="table">

<div class="w3-container w3-black">
      <h1>Nguyên liệu mới</h1>
    </div>

<div class="w3-container">
<div id="error" style="color:red"></div>
<form id="addForm" method="POST" action="new_product.php" >
		
		<p> <label for="idprod"class="w3-text-black margin-5">Nhập ID của nguyên liệu:</label></p>
		<p>	<input type="text" name="idprod" id ="idprod" class="w3-input w3-padding-16 w3-border"/></p>
		
		<p> <label for="name"class="w3-text-black margin-5">Tên nguyên liệu mới</label></p>
		<p>	<input type="text" name="name" id="name" class="w3-input w3-padding-16 w3-border"/></p>

		<p><label for="unit" class="w3-text-black margin-5">Đơn vị</label></p>
		<p>	<input type="text" name="unit" id="unit" class="w3-input w3-padding-16 w3-border"/> </p>
		
		<p><label for="price" class="w3-text-black margin-5">Giá thành nguyên liệu </label></p>
			<p><input type="text" name="price" id="price" class="w3-input w3-padding-16 w3-border"/></p>
		
			<p> <input class="w3-button w3-text-black w3-border" type="submit" value="Thêm nguyên liệu"/> </p>
		<?php 
		session_start();
		if (isset( $_SESSION['notification'])) {
			$noti=$_SESSION['notification'];
			echo "<div class=\"w3-text-black\"> $noti   </div>";
            $_SESSION['notification']=null;
		}	
		?>
		<script>
			var id=<?php echo json_encode($_SESSION['idpro']); ?>;
			var name=<?php echo json_encode($_SESSION['name']); ?>;
			var unit=<?php echo json_encode($_SESSION['unit']); ?>;
			var price=<?php echo json_encode($_SESSION['price']); ?>;
			document.getElementById("idprod").value = id;
			document.getElementById("name").value = name;
			document.getElementById("unit").value = unit;
			document.getElementById("price").value = price;
		</script>	
	</form>
	</div>
	</div>
  
</div>

</body>
</html>
