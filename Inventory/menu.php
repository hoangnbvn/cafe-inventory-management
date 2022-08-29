<!DOCTYPE html>
<html>
<title>Inventory Manager</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="design.css">
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
<body>
<?php 
	require_once("connection.php");
    $con = pg_connect("host=$host port=5432 dbname='$db' user=$user password=$pass") or die ("could not connect to Server\n");
    $sql_tb="product";
    $query="SELECT * FROM $sql_tb WHERE warning >= quantity";
    $result = pg_query($con, $query);
    $nameProd=pg_fetch_all_columns($result,1);
    $report=count($nameProd);
?>


<div class="bgimg w3-display-container w3-text-white">
  <div class="w3-display-middle w3-jumbo">
    <p>logo</p>
  </div>

  <div class="w3-display-topleft">
    <p><img src="logocaphe.png" alt="logo" width="300px" height="100px"/></p>
  </div>

  <nav class=" w3-container w3-padding-24 w3-large">
    <?php echo("<p><a href=\"warning\waring.php\" class=\"w3-button w3-black\">Gợi ý ( $report )</a></p>");?>
    <p><a href="import\import_product.php" class="w3-button w3-black">Nhập Hàng</a></p>
    <p><a href="export\export_product.php" class="w3-button w3-black">Xuất Hàng</a></p>
    <p><a href="add_newproduct\add_product.php" class="w3-button w3-black">Nguyên liệu mới</a></p>
    <p><a href="select_product\select_product.php" class="w3-button w3-black">Kho Hàng</a></p>
    <p><a href="menu.php" class="w3-button w3-black">Trang chủ</a></p>
</nav>
  
  <div class="w3-display-bottomleft w3-container">
    <p class="w3-xlarge">T2-T6 10h-22h | T7,CN 08h-22h</p>
    <p class="w3-large">283 Hà Huy Tập, Quảng Bình</p>
  </div>
</div>



</body>
</html>
