<?php
include ("include/db_connect.php");
error_reporting(0);
$cat = $_GET["cat"];
$type =$_GET["type"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <link href="css/reset.css" rel="stylesheet" type="text/css"/>
    <link href="trackbar/trackbar.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript"
            src="http://www.xiper.net/examples/js-plugins/gallery/jcarousellite/js/jcarousellite.js"></script>
    <script type="text/javascript" src="js/shop-script.js"></script>
    ﻿
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    ﻿
    <script type="text/javascript" src="trackbar/jquery.trackbar.js"></script>

    <title>Поиск по параметрам</title>
</head>
<body>
<div id="block-body">
    <?php
    include('include/block-header.php');
    ?>
    <div id="block-right">
        <?php
        include('include/block-category.php');
        include('include/block-parameter.php');
        include('include/block-news.php');
        ?>
    </div>
    <div id="block-content">

        <?php
        if ($_GET["brand"])
        {
            $check_brand = implode(',',$_GET["brand"]);
        }

        $start_price = (int)$_GET["start_price"];
        $end_price = (int)$_GET["end_price"];


        if (!empty($check_brand) OR !empty($end_price))
        {

            if (!empty($check_brand)) $query_brand = " AND brand_id IN($check_brand)";
            if (!empty($end_price)) $query_price = " AND price BETWEEN $start_price AND $end_price";


        }
        $link = mysqli_connect("localhost", "admin", "acvgufrcdre", "db_shop");
        mysqli_query($link, "SET NAMES utf8");
        $result = mysqli_query($link,"SELECT * FROM table_products WHERE visible='1' $query_brand $query_price ORDER BY products_id DESC ");
        if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        echo '
            <div id="block-sorting">
            <p id="nav-breadcrumbs"><a href="index.php">Главная страница</a> \ <span>Все товары</span></p>
            <ul id="options-list">
                <li>Вид:</li>
                <li><img id="style-grid" src="./images/icon-grid.png"/></li>
                <li><img id="style-list" src="./images/icon-list.png"/></li>
                <li>Сортировать:</li>
                <li><a id="select-sort">'.$sort_name.'</a>
                    <ul id="sorting-list">
                        <li><a href="view_cat.php?cat='.$cat.'&type='.$type.'&sort=price-asc">От дешевых к дорогим</a></li>
                        <li><a href="view_cat.php?cat='.$cat.'&type='.$type.'&sort=price--desc">От дорогих к дешевым</a></li>
                        <li><a href="view_cat.php?cat='.$cat.'&type='.$type.'&sort=popular">Популярное</a></li>
                        <li><a href="view_cat.php?cat='.$cat.'&type='.$type.'&sort=news">Новинки</a></li>
                        <li><a href="view_cat.php?cat='.$cat.'&type='.$type.'&sort=brand">От А до Я</a></li>
                    </ul>
                </li>
            </ul>
        </div>
          <ul id="block-tovar-grid">
            ';
        do {

            if ($row["image"] != "" && file_exists("../uploads_images/" . $row["image"])) {
                $img_path = '../uploads_images/' . $row["image"];
                $max_width = 200;
                $max_height = 200;
                list($width, $height) = getimagesize($img_path);
                $ratioh = $max_height / $height;
                $ratiow = $max_width / $width;
                $ratio = min($ratioh, $ratiow);
                $width = intval($ratio * $width);
                $height = intval($ratio * $height);
            } else {
                $img_path = "./include/no_images.png";
                $width = 110;
                $height = 200;
            }

            echo '
       
        <li>
        
         <div class="block-images-grid">
         
          <img src="' . $img_path . '" width ="' . $width . '" height = "' . $height . '" />
          
          </div>
  <p class="style-title-grid" ><a href="" >' . $row["title"] . '</a></p>
  <ul class="reviews-and-counts-grid">
  <li><img src="./images/eye-icon.png" /><p>0</p></li>
  <li><img src="./images/comment-icon.png" /><p>0</p></li>
  </ul>
  <a class="add-cart-style-grid" ></a>
  <p class="style-price-grid" ><strong>' . $row["price"] . '</strong> б.р.</p>
  <div class="mini-features" >
  ' . $row["mini_features"] . '
  </div>
        </li>';
        } while ($row = mysqli_fetch_array($result));

        ?>
        </ul>
        <ul id="block-tovar-list">
            <?php
            $link = mysqli_connect("localhost", "admin", "acvgufrcdre", "db_shop");
            mysqli_query($link, "SET NAMES utf8");
            $result = mysqli_query($link,"SELECT * FROM table_products WHERE visible='1' $query_brand $query_price ORDER BY products_id DESC ");


            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result);
                do {

                    if ($row["image"] != "" && file_exists("../uploads_images/" . $row["image"])) {
                        $img_path = '../uploads_images/' . $row["image"];
                        $max_width = 150;
                        $max_height = 150;
                        list($width, $height) = getimagesize($img_path);
                        $ratioh = $max_height / $height;
                        $ratiow = $max_width / $width;
                        $ratio = min($ratioh, $ratiow);
                        $width = intval($ratio * $width);
                        $height = intval($ratio * $height);
                    } else {
                        $img_path = "./include/noimages80x70.png";
                        $width = 80;
                        $height = 70;
                    }

                    echo '
       
        <li>
        
         <div class="block-images-list">
         
          <img src="' . $img_path . '" width ="' . $width . '" height = "' . $height . '" />
          
          </div>
 
  <ul class="reviews-and-counts-grid">
  <li><img src="./images/eye-icon.png" /><p>0</p></li>
  <li><img src="./images/comment-icon.png" /><p>0</p></li>
  </ul>
   <p class="style-title-list" ><a href="" >' . $row["title"] . '</a></p>
  <a class="add-cart-style-list" ></a>
  <p class="style-price-list" ><strong>' . $row["price"] . '</strong> б.р.</p>
  <div class="style-text-list" >
  ' . $row["mini_description"] . '
  </div>
        </li>';
                } while ($row = mysqli_fetch_array($result));
            }
            }
            else{
                echo '<h3>Категория недоступна или не создана</h3>';
            }
            ?>
        </ul>
    </div>
    <?php
    include ('include/block-footer.php');
    ?>
</div>

</body>
</html>