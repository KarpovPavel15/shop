<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $link = mysqli_connect("localhost", "admin", "acvgufrcdre", "db_shop");


    $login = $_POST["login"];

    $password   = $_POST["password"];

    if ($_POST["rememberme"] == "yes")
    {

        setcookie('rememberme',$login.'+'.$password,time()+3600*24*31, "/");

    }


    $result = mysqli_query($link,"SELECT * FROM users WHERE login = '$login' AND password = '$password'");
    If (mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_array($result);
        session_start();
        $_SESSION['auth'] = 'yes_auth';
        $_SESSION['auth_name'] = $row["name"];
        $_SESSION['auth_pass'] = $row["password"];
        $_SESSION['auth_login'] = $row["login"];
        echo 'yes_auth';

    }else
    {
        echo 'no_auth';
    }
} ?>