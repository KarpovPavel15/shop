<div id="block-header">
    <div id="header-top-block">

        <ul id="header-top-menu">
            <li>Ваш город - <span>Гродно</span></li>
            <li><a href="about-us.php">О нас</a></li>
            <li><a href="shops.php">Магазины</a></li>
            <li><a href="contacts.php">Контакты</a></li>
        </ul>


        <?php

        if ($_SESSION['auth'] == 'yes_auth')
        {

            echo '<p id="auth-user-info" align="right"><img src="./images/user.png" />Здравствуйте, '.$_SESSION['auth_name'].'!</p>';

        }else{

            echo '<p id="reg-auth-title" align="right"><a class="top-auth">Вход</a><a href="registration.php">Регистрация</a></p>';

        }

        ?>

        <div id="block-top-auth">

            <div class="corner"></div>

            <form method="post">


                <ul id="input-email-pass">

                    <h3>Вход</h3>

                    <p id="message-auth">Неверный Логин и(или) Пароль</p>

                    <li><center><input type="text" id="auth_login" placeholder="Логин или E-mail" /></center></li>
                    <li><center><input type="password" id="auth_pass" placeholder="Пароль" /><span id="button-pass-show-hide" class="pass-show"></span></center></li>

                    <ul id="list-auth">
                        <li><input type="checkbox" name="rememberme" id="rememberme" /><label for="rememberme">Запомнить меня</label></li>
                        <li><a id="remindpass" href="#">Забыли пароль?</a></li>
                    </ul>


                    <p align="right" id="button-auth" ><a>Вход</a></p>

                    <p align="right" class="auth-loading"><img src="./images/loading.gif" /></p>

                </ul>
            </form>

        </div>
    </div>

 <div id="top-line"></div>
    <!-- Логотип -->
    <img id="img-logo" src="./images/logo.png">
    <!-- Информационный блок -->
    <div id="personal-info">
        <p align="right">Звонок бесплатный.</p>
        <h3 align="right">+375(29)2836402</h3>
        <img src="./images/phone-icon.png" />
        <p align="right">Режим работы:</p>
        <p align="right">Будние дни: с 9:00 до 18:00</p>
        <p align="right">Суббота, Воскресенье - выходные</p>
        <img src="./images/time-icon.png" />
    </div>
    <!-- Форма поиска -->
    <div id="block-search">
        <form method="GET" action="" >
            <span></span>
            <input type="text" id="input-search" name="q" placeholder="Поиск среди более 100 000 товаров" value="" />
            <input type="submit" id="button-search" value="Поиск" />
        </form>

        <ul id="result-search">


        </ul>

    </div>
    <!-- Средняя навигация -->
    <div id="top-menu">
        <ul>
            <li><img src="./images/shop.png" /><a href="index.php">Главная</a></li>
            <li><img src="./images/new-32.png" /><a href="">Новинки</a></li>
            <li><img src="./images/bestprice-32.png" /><a href="">Лидеры продаж</a></li>
            <li><img src="./images/sale-32.png" /><a href="">Распродажа</a></li>
        </ul>
        <p align="right" id="block-basket"><img src="./images/cart-icon.png" /><a href="" >Корзина пуста</a></p>
        <div id="nav-line"></div>
    </div>
</div>