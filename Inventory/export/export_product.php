<!DOCTYPE html>
<html lang="en">
<head>
	<title> Quản lý kho </title>
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
    $query0="SELECT* FROM $sql_query";
    $result = pg_query($con, $query0);
    $nameProd=pg_fetch_all_columns($result,1);
    $idProd=pg_fetch_all_columns($result,0);
    $numberProd=pg_fetch_all_columns($result,3);
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
        <p><a href="..\import\import_product.php" class="w3-button w3-black">Nhập Hàng</a></p>
        <p><a href="export_product.php" class="w3-button w3-black">Xuất Hàng</a></p>
        <p><a href="..\add_newproduct\add_product.php" class="w3-button w3-black">Nguyên liệu mới</a></p>
        <p><a href="..\select_product\select_product.php" class="w3-button w3-black">Kho Hàng</a></p>
        <p><a href="..\menu.php" class="w3-button w3-black">Trang chủ</a></p>
    </nav>
    <div>

    <div class=" w3-modal-content " id="table">
    <div class="w3-container w3-black">
      <h1>Xuât Hàng</h1>
    </div>

    <div class="w3-container">
    <form id="addForm" method="POST" action="new_export.php" >
    <?php
        if (isset( $_SESSION['notification'])) {
            $noti=$_SESSION['notification'];
			echo "<h3 class=\"w3-text-black\"> $noti   </h3>";
            $_SESSION['notification']=null;
		}
        ?>
	<div id="error" style="color:red"></div>
        <?php
        $i=0;
        
        while($i<count($idProd)){
            $j=1;
            $id="id".$i;

            echo "<p>";
		    
            echo "<label for=\"$id\" class=\"w3-text-black\"> Số lượng ".$nameProd[$i]." xuất ra:</label></p>";
            echo"<p><select class=\"w3-input w3-padding-16 w3-border\" name=\"$id\" id=\"$id\">";
            echo"<option value=\"0\">0</option>";
            while($j<=$numberProd[$i]){    
			    echo"<option value=\"$j\">$j</option>";
                $j+=1;
                }
		    echo"</select>";

		    echo "</p>";
        $i+=1;
        }

        $k=0;
        $manager="manager";
        echo"<p>";
        echo"<select class=\"w3-input w3-padding-16 w3-border\" name=\"$manager\" id=\"$manager\">
			<option value=\"1\" >Quản lý xuất kho là:</option>";
            while($k<count($idManager)){    
			    echo"<option value=\"".$idManager[$k]."\">".$nameManager[$k]."</option>";
                $k+=1;
                }
		    echo"</select>";
        echo"</p>";
        ?>

        <p>
            <label for="shift" class="w3-text-black"> Ca xuất nguyên liệu là</label></p>
         <p>   <select class="w3-input w3-padding-16 w3-border" name="shift" id="shift">
                <option value="Sang" >Sang</option>";
                <option value="Chieu" >Chieu</option>";
                <option value="Toi" >Toi</option>";
            </select>
        </p>
        <p> 
			<input type="submit" class="w3-border" value="Xuất hàng"/>
		</p>
        
	</form>
    </div>
    </div>
    </div>
    </div>

    
    <?php
    $_SESSION["count_product"]=count($idProd);
    $_SESSION["idpro"]=$idProd;
    ?>
	
</body>
</html>