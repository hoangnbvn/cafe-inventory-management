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
    <p><a href="..\add_newproduct\add_product.php" class="w3-button w3-black">Nguyên liệu mới</a></p>
    <p><a href="select_product.php" class="w3-button w3-black">Kho Hàng</a></p>
    <p><a href="..\menu.php" class="w3-button w3-black">Trang chủ</a></p>
</nav>
  

	
    <div class=" w3-modal-content " id="table">
    <table class="w3-table w3-centered w3-hoverable" >
    <thead class="w3-container w3-large">
            <tr class="w3-black ">
                <th>ID</th>
                <th>Name</th>
                <th>Unit</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>VAT</th>
                <th>Warning</th>
            </tr>
    </thead>
            <?php
	        require_once("D:\\xampp\\htdocs\\Inventory\\connection.php");
            $con = pg_connect("host=$host port=5432 dbname='$db' user=$user password=$pass") or die ("could not connect to Server\n");
            $sql_query="product";
            $query="SELECT* FROM $sql_query ORDER BY id";
            $result = pg_query($con, $query);
            while ($data = pg_fetch_object($result)) {
                echo"<tr  class=\"w3-border\">";
                echo "<td>";
                echo $data->id."</td>";
                echo "<td>";
                echo $data->name."</td>";
                echo "<td>";
                echo $data->unit."</td>";
                echo "<td>";
                echo $data->quantity."</td>";
                echo "<td>";
                echo $data->price."</td>";
                echo "<td>";
                echo $data->vat."</td>";
                echo "<td>";
                echo $data->warning."</td>";
                echo"</tr>";
            }
            ?>
            </table>
        </div>
        </div>
    
</body>
</html>