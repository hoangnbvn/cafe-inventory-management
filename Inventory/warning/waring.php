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
<?php
    require_once("..\connection.php");
    $con = pg_connect("host=$host port=5432 dbname='$db' user=$user password=$pass") or die ("could not connect to Server\n");
    $sql_tb="product";
    $query="SELECT * FROM $sql_tb WHERE warning >= quantity";
    $result = pg_query($con, $query);
    $nameProd=pg_fetch_all_columns($result,1);
    $report=count($nameProd);
    // gợi ý sáng
    $query="SELECT export.productid, product.name , SUM(export.quantity)/7 as avg_qty 
    FROM export INNER JOIN product 
    ON export.productid = product.id
    WHERE export.day>=(current_timestamp::date - '7 day'::interval)
        AND export.shift = 'Sang'
    GROUP BY export.productid, product.id
    ORDER BY avg_qty desc
    LIMIT 5";
    $result = pg_query($con, $query);
    $goi_y_sang=pg_fetch_all_columns($result,1);
    $sl_sang=pg_fetch_all_columns($result,2);
    // gợi ý chiều
    $query="SELECT export.productid, product.name , SUM(export.quantity)/7 as avg_qty 
    FROM export INNER JOIN product 
    ON export.productid = product.id
    WHERE export.day>=(current_timestamp::date - '7 day'::interval)
        AND export.shift = 'Chieu'
    GROUP BY export.productid, product.id
    ORDER BY avg_qty desc
    LIMIT 5";
    $result = pg_query($con, $query);
    $goi_y_chieu=pg_fetch_all_columns($result,1);
    $sl_chieu=pg_fetch_all_columns($result,2);
    // gợi ý tối
    $query="SELECT export.productid, product.name , SUM(export.quantity)/7 as avg_qty 
    FROM export INNER JOIN product 
    ON export.productid = product.id
    WHERE export.day>=(current_timestamp::date - '7 day'::interval)
        AND export.shift = 'Toi'
    GROUP BY export.productid, product.id
    ORDER BY avg_qty desc
    LIMIT 5";
    $result = pg_query($con, $query);
    $goi_y_toi=pg_fetch_all_columns($result,1);
    $sl_toi=pg_fetch_all_columns($result,2);


?>
</head>

<body>

<div class="bgimg w3-display-container w3-text-white">
    <div class="w3-display-topleft">
    <p><img src="..\logocaphe.png" alt="logo" width="300px" height="100px"/></p>
    </div>

    <nav class=" w3-container w3-padding-24 w3-large">
        <?php echo("<p><a href=\"waring.php\" class=\"w3-button w3-black\">Gợi ý ($report)</a></p>")?>
        <p><a href="..\import\import_product.php" class="w3-button w3-black">Nhập Hàng</a></p>
        <p><a href="..\export\export_product.php" class="w3-button w3-black">Xuất Hàng</a></p>
        <p><a href="..\add_newproduct\add_product.php" class="w3-button w3-black">Nguyên liệu mới</a></p>
        <p><a href="..\select_product\select_product.php" class="w3-button w3-black">Kho Hàng</a></p>
        <p><a href="..\menu.php" class="w3-button w3-black">Trang chủ</a></p>
    </nav>
  

	
    <div class=" w3-modal-content " id="table">
    <div class="w3-container w3-black w3-display-container w3-xxlarge">
      Nguyên liệu sắp hết
    </div>
    <div class="w3-container">
        <?php
            $i=0;
            echo("<h3 class=\"w3-text-black\">");
            while($i<count($nameProd)){
                if($i<count($nameProd)-1)
                echo("$nameProd[$i], ");
                else{
                    echo("$nameProd[$i].");
                }
                $i+=1;
            }
            echo("</h3>");
        ?>
    </div>
    <div class="w3-container w3-black w3-display-container w3-xxlarge">
      Gợi ý xuất ca Sáng
    </div>
    <div class="w3-container">
        <?php
        
        $i=0;
        echo("<h3 class=\"w3-text-black\">");
        while($i<count($goi_y_sang)){
            $ceiled=ceil($sl_sang[$i]);
            if($i<count($goi_y_sang)-1)
            echo("<p>-$goi_y_sang[$i] : $ceiled </p> ");
            else{
                echo("<p>-$goi_y_sang[$i] : $ceiled </p>");
            }
            $i+=1;
        }
        echo("</h3>");
    ?>
    </div>

    <div class="w3-container w3-black w3-display-container w3-xxlarge">
      Gợi ý xuất ca Chiều
    </div>
    <div class="w3-container">
        <?php
        
        $i=0;
        echo("<h3 class=\"w3-text-black\">");
        while($i<count($goi_y_chieu)){
            $ceiled = ceil($sl_chieu[$i]);
            if($i<count($goi_y_chieu)-1)
            echo("<p>-$goi_y_chieu[$i] : $ceiled </p>");
            else{
                echo("<p>-$goi_y_chieu[$i] : $ceiled </p>");
            }
            $i+=1;
        }
        echo("</h3>");
    ?>
    </div>

    <div class="w3-container w3-black w3-display-container w3-xxlarge">
      Gợi ý xuất ca Tối
    </div>
    <div class="w3-container">
        <?php
        
        $i=0;
        echo("<h3 class=\"w3-text-black\">");
        while($i<count($goi_y_toi)){
            $ceiled = ceil($sl_toi[$i]);
            if($i<count($goi_y_toi)-1)
            echo("<p>-$goi_y_toi[$i] : $ceiled </p>");
            else{
                echo("<p>-$goi_y_toi[$i] : $ceiled </p>");
            }
            $i+=1;
        }
        echo("</h3>");
    ?>
    </div>
    
</div>
</div>
    
</body>
</html>