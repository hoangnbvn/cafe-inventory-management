<!DOCTYPE html>
<html lang="en">
<head>
	<title> Import product </title>
	<meta charset="utf-8"/>
	<meta name="description" content="add student to database"/>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="design.css">
    <?php 
    require_once("..\connection.php");
    $con = pg_connect("host=$host port=5432 dbname='$db' user=$user password=$pass") or die ("could not connect to Server\n");
    $sql_query="product";
    //product
    session_start();
    $query0="SELECT* FROM $sql_query ORDER BY id";
    $result = pg_query($con, $query0);
    $nameProd=pg_fetch_all_columns($result,1);
    $idProd=pg_fetch_all_columns($result,0);
    //suppler
    $sql_query="supplier";
    $query0="SELECT* FROM $sql_query";
    $result = pg_query($con, $query0);
    $nameSupplier=pg_fetch_all_columns($result,1);
    $idSupplier=pg_fetch_all_columns($result,0);
    //manager
    $sql_query="manager";
    $query0="SELECT* FROM $sql_query";
    $result = pg_query($con, $query0);
    $nameManager=pg_fetch_all_columns($result,3);
    $idManager=pg_fetch_all_columns($result,0);
    pg_close($con);
    ?>
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
    <p><a href="import_product.php" class="w3-button w3-black">Nhập Hàng</a></p>
    <p><a href="..\export\export_product.php" class="w3-button w3-black">Xuất Hàng</a></p>
    <p><a href="..\add_newproduct\add_product.php" class="w3-button w3-black">Nguyên liệu mới</a></p>
    <p><a href="..\select_product\select_product.php" class="w3-button w3-black">Kho Hàng</a></p>
    <p><a href="..\menu.php" class="w3-button w3-black">Trang chủ</a></p>
</nav>
  
<div class=" w3-modal-content " id="table">
    <div class="w3-container w3-black">
      <h1>Nhập Hàng</h1>
    </div>

    <div class="w3-container">
    <div class="w3-text-black w3-xlarge"> Điền số lượng hàng muốn nhập vào kho(1-999)</div>
    <form id="addForm" method="POST" action="new_import.php" >
    <div id="error" style="color:red"></div>
    <?php
        if (isset( $_SESSION['notification'])) {
            $noti=$_SESSION['notification'];
			echo "<h3 class=\"w3-text-black\"> $noti   </h3>";
            $_SESSION['notification']=null;
		}
        ?>


        <?php
        $i=0;
        
        while($i<count($idProd)){
            $id="id".$i;
            
            echo "<p>";
            
            echo "<label for=\"$id\" class=\"w3-text-black\">Số lượng $nameProd[$i] nhập vào kho:</label></p>";
            echo"<p><input type=\"text\" name=\"$id\" id =\"$id\" pattern=\"^(([0-9])|([1-9][0-9])|([1-9][0-9][0-9]))$\"
               class=\"w3-input w3-padding-16 w3-border\" value=\"0\"/>";
        
            echo "</p>";
        $i+=1;
        }
        $j=0;
        $k=0;
        $supplier="supplier";
        $manager="manager";
        echo"<p><select name=\"$supplier\" id=\"$supplier\" class=\"w3-input w3-padding-16 w3-border\">
            <option value=\"1\" >Chọn Đơn vị cung cấp </option>";
            while($j<count($idSupplier)){    
                echo"<option value=\"$idSupplier[$j]\">$nameSupplier[$j]</option>";
                $j+=1;
                }
            echo"</select></p>";

            echo"<p><select name=\"$manager\" id=\"$manager\" class=\"w3-input w3-padding-16 w3-border\">
            <option value=\"1\" >Chọn người nhập hàng vào kho </option>";
            while($k<count($idManager)){    
                echo"<option value=\"".$idManager[$k]."\">".$nameManager[$k]."</option>";
                $k+=1;
                }
            echo"</select></p>";
        ?>
        <p> 
            <input type="submit" class="w3-border" value="Nhập hàng vào kho "/>
        </p>
        <?php
        if (isset( $_SESSION['notification'])) {
            $noti=$_SESSION['notification'];
			echo "<div class=\"w3-text-black\"> $noti   </div>";
            $_SESSION['notification']=null;
		}
        ?>
    </form>

    
    </div>

</div>

	
    
    <?php
    $_SESSION["count_product"]=count($idProd);
    $_SESSION["idpro"]=$idProd;
    ?>
	
</body>
</html>