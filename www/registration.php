<?php
include ("include/db_connect.php");
error_reporting(0);
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
    <script src="http://malsup.github.com/jquery.form.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

        <title>Регистрация</title>
</head>
<body>

<div id="block-body">
    <?php
    include("include/block-header.php");
    ?>
    <div id="block-right">
        <?php
        include("include/block-category.php");
        include("include/block-parameter.php");
        include("include/block-news.php");
        ?>
    </div>
    <div id="block-content">
        <h2 class="h2-title">Регистрация</h2>
        <?php
        $link = mysqli_connect("localhost", "admin", "acvgufrcdre", "db_shop");
        mysqli_query($link, "SET NAMES utf8");
        $data=$_POST;
        if(isset($data['do_registration']))
        {
            $errors=array();
            if(trim($data['login'])=='')
            {
                $errors[]='Введите логин';
            }
            if(trim($data['email'])=='')
            {
                $errors[]='Введите Email';
            }
            if(trim($data['password'])=='')
            {
                $errors[]='Введите пароль';
            }
            if(trim($data['password_2'])!=$data['password'])
            {
                $errors[]='Повторный пароль введен не верно';
            }
            if(empty($errors))
            {
$user=R::dispense('users');
$user->login=$data['login'];
$user->email=$data['email'];
                $user->password = $data['password'];
R::store($user);
                echo '<div style="color:green;">Успешная регистрация</div><hr>';
            }
            else{
                echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
            }
        }
        ?>
        <form action="./registration.php" method="POST">
            <p>
            <p><strong>Ваш логин</strong>:</p>
            <input type="text" name="login" value="<?php echo @$data['login'];?>">
            </p>
            <p>
            <p><strong>Ваш Email</strong>:</p>
            <input type="email" name="email" value="<?php echo @$data['email'];?>">
            </p>
            <p>
            <p><strong>Ваш пароль</strong>:</p>
            <input type="password" name="password" value="<?php echo @$data['password'];?>">
            </p>
            <p><strong>Введите еще раз ваш пароль</strong>:</p>
            <input type="password" name="password_2" value="<?php echo @$data['password_2'];?>">
            </p>
            <p>
                <button type="submit" name="do_registration">Зарегистрироваться</button>
            </p>



        </form>


    </div>

    <?php
    include("include/block-footer.php");
    ?>
</div>

</body>
</html>