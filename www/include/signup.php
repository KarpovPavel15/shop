<?php
R::setup('mysql:host=localhost;dbname=db_shop','admin','acvgufrcdre');
require "../include/rb.php";
mysqli_query($link, "SET NAMES utf8");
$data=$_POST;
if(isset($data['do_signup']))
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
    if(R::count('users','login=?',array($data['login']))>0)
    {
        $errors[]='Пользователь с таким логином уже существует';
    }
    if(R::count('users',"email=?",array($data['email']))>0)
    {
        $errors[]='Пользователь с таким email-ом уже существует';
    }
    if(empty($errors))
    {
        $user=R::dispense('users');
        $user->login=$data['login'];
        $user->email=$data['email'];
        $user->password=$data['password'];
        R::store($user);
        echo '<div style="color:green;">Успешная регистрация</div><hr>';
    }
    else{
        echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
    }
}
?>
<form action="signup.php" method="POST">
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
        <button type="submit" name="do_signup">Зарегистрироваться</button>
    </p>



</form>