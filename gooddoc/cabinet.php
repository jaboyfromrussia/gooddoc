<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизиция</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="/css/grid.css">
    <link rel="stylesheet" type="text/css" href="/css/queries.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.css">
</head>

<body>
    <?php
        include ('script/php/connect.php');
        if($_COOKIE['user'] != ''):
    ?>
    <header>
        <nav>
            <div class="row">
                <p>
                    <a href="#">
                        <img src="/img/logo-white.svg" alt="GoodDoc" class="logo">
                        <img src="/img/logo.svg" alt="GoodDoc" class="logo-black">
                    </a>
                </p>
                <ul class="main-nav">
                    <li>
                        <a href="index.php">Главная</a>
                    </li>
                    <li>
                        <a href="/script/php/logout.php">Выход</a>
                    </li>
                    <li>
                        <a class="phone-link" href="tel:89503047737">+7 (950) 304-77-37</a>
                    </li>
                </ul>
            </div>
        </nav>

        <?php
            // для списка вып. полей нужно
            // ставим кодировку.
            mysqli_set_charset($mysql, "utf8"); 
            // таблица: spec, два поля: id, spec-doc
            $sql = mysqli_query($mysql, "SELECT * FROM `spec`");
            $options_out='';
            while ($a= mysqli_fetch_array($sql,MYSQLI_ASSOC)){
                // Формируем вывод
                $options_out.= '<option>'.$a['spec-doc'].'</option>'."\n";
                }
                
                $mysql->close();
        ?>



        <div class="row">
            <div class="header-content vs">
                <form action="script/php/signings.php" method="post">
                    <select type="text" name="spec" id="spec">
                        <?php
                // вывод в виде выпадающего списка
                echo $options_out;
              ?>
                    </select>

                    <div class="row">
                        <div class="col span-5-of-12">
                            <label>&nbsp;</label>
                        </div>
                        <div class="col span-6-of-12">
                            <button class="btn btn-primary" type="submit">Вывести</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </header>

    <p> Привет <?=$_COOKIE['user']?></p>

    <footer>
        <div class="row">
            <div class="col span-1-of-2">
                <ul class="footer-nav">
                    <p>Меню</p>
                    <li><a href="#">Главная</a></li>
                    <li><a href="#">О нас</a></li>
                    <li><a href="#">Как мы работаем</a></li>
                </ul>
            </div>
            <div class="col span-1-of-2">
                <ul class="social">
                    <p>Связаться с нами</p>
                    <li><a href="#">
                            <ion-icon name="mail-outline"></ion-icon>
                        </a></li>
                    <li><a href="#">
                            <ion-icon name="call-outline"></ion-icon>
                        </a></li>
                    <li><a href="#">
                            <ion-icon name="logo-instagram"></ion-icon>
                        </a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <p>г. Абакан, ул. Чертыгашева, д.112</p>
        </div>

    </footer>


    <!-- ICONS -->
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <?php else: 
            echo '
            <div class="col">
                <div class="header-content">
                    <form action="script/php/auth.php" method="post">
                        <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин"><br>
                        <input type="password" class="form-control" name="pass" id="pass" placeholder="Введите пароль"><br>
                        <div class="row">
                        <div class="col span-5-of-12">
                            <label>&nbsp;</label>
                        </div>
                        <div class="col span-6-of-12">
                            <button class="btn btn-primary" type="submit">Войти в аккаунт</button>
                        </div>
                    </div>
                        
                    </form>
                </div>
            </div>
            ';
?>
    <?php endif;?>
</body>

</html>