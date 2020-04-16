<?
    $server = $_SERVER['SERVER_ADDR'];
    $username = 'root';
    $password = '';
    $db_name= 'my_first';
    $charset = 'utf8';

    $connection = new mysqli ($server, $username, $password, $db_name);

    function printResult ($result_set) {
        while (($row = $result_set->fetch_assoc()) !=false) {
            echo $row['product_name'];
            echo $row['product_commit'];
            echo $row['product_image'];
            echo $row['id_category'];
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Главная</title>
    <link href= "style.css" rel="stylesheet">
    <link href= "style.css" rel="stylesheet" media=" (max_width:1024px)">
</head>
<body>
<header class="header">
        <ul class="header_menu">
            <li><a href="" class=""><b>О магазине</b></a></li>
            <li><a href="" class=""><b>Помощь</b></a></li>
            <li><a href="" class=""><b>Новости</b></a></li>
            <li><a href="" class=""><b>Гарантия</b></a></li>
            <li><a href="" class=""><b>Сервис</b></a></li>
            <li><a href="" class=""><b>Вопрос - Ответ</b></a></li>
            <li><a href="" class=""><b>Обратная связь</b></a></li>
            <li><a href="" class=""><b>Оплата и Доставка</b></a></li>
            <li><a href="" class=""><b>Правила дистанционной торговли</b></a></li>
        </ul>
    <div class="header_content">
        
        <dib class="header_content_logo">
        </dib>
        <div class="header_content_name"><p>интернет-магазин<br>электроинструмента</p>
        </div>
        <div class="header_content_location"><br><h1>Барнаул</h1><p>+7 (3852) 223-322<br>Работаем 10-19, вых. воскр<br>заказ на сайте круглосуточно</p>
        </div>
        <div class="header_content_all">
            <div class="a">
                <a href="" class="">Регистрация</a>  |
                <a href="" class="">Вход</a>
            </div>
            <div class="b">
                <a href="" class="">Ваша корзина пуста</a>
            </div>
            <div class="c">
                <p><input type="search" name="search" placeholder="поиск по сайту"> <input type="submit" value="искать"></p>
            </div>
        </div>
        
    </div>
</header>
<div class="body">
    <div>
        <div class="body_body">
            <div class="body_tovar">
                <div class="Rec0"><b class="Rec">Рекомендуем</b>
                    <div class="add">
                        <a href="index4.php" class=""><b>Добавить элемент</b></a>
                    </div>
                </div>
                <div class="body_tovar_stroka_1">
                    <!-- Циклом выводим файлы из массива -->
                    <?php
					// $products= file ('my_form_reports.txt');
                        // foreach ($products as $key => $value)
                            // {
                                // $PRODUCTS[] = array (explode (", ", $products[$key])); }
                                // $q = $connection->query("SELECT `id` FROM `products` WHERE `id` = VALUES ");
                                // echo "<br>$q<br>";
                        		for($i=1;$i<=10; $i++):
                        // while ($row)
                    ?>

                        <div class="tovar_0">
                            <div class="t_0">
                                <img src="images/<?php $result_set = $connection->query("SELECT `product_image` FROM `products` WHERE `id`='$i' "); printResult($result_set);  ?>"> <!-- echo $PRODUCTS[$i][0][2]; -->
                            </div>
                            
                            <div class="banner_length">
                                <a><p class="banner"><?php $result_set = $connection->query("SELECT `product_name` FROM `products` WHERE `id`='$i' "); printResult($result_set); ?></p></a> 
								<p class="commit"><?php $result_set = $connection->query("SELECT `product_commit` FROM `products` WHERE `id`='$i' "); printResult($result_set); ?></p>
                                <p class="t"><b>1250 руб</b></p>
                                <div class="kor">
                                    <a class="kor1"><p class="kor0">В корзину</p></a>
                                </div>
                            </div>
                        </div>

                    <?php   
                            
                            endfor;
                            $connection->close();
                    ?>
                    <!-- Вот до сюда -->
                </div>
            </div>
            <div class="body_text">
                    <h1 class="body_magazine_banner">О магазине</h1>
                    <div class="body_magazine">
                        <p style="margin: 0;">УВАЖАЕМЫЕ ПОСЕТИТЕЛИ!<br> Наша компания занимается продажей профессионального, любительского инструмента и оборудования более 15 лет. Сегодня ассортимент компании насчитывает более 10 тысяч наименований высококачественной техники и расходных материалов. У нас Вы можете приобрести: Аккумуляторный инструмент: Дрели-шуруповерты, Ударные винтоверты, Перфораторы, Угловые шлифовальные машины (Болгарки), Эксцентриковые шлифовальные машины, Сабельные и дисковые пилы, Плиткорезы, Краскопульты, Пистолеты для герметика, Лазерные уровни и дальномеры. Сетевые дрели и шуруповерты, перфораторы и отбойные молотки, углошлифовальные машины, монтажные пилы, полировальные машины, фрезеры, рубанки, вибрационные и ленточные шлифмашины, лобзиковые, дисковые и сабельные пилы, торцовочные пилы, распиловочные станки, плиткорезы, штроборезы, технические фены, пылесосы, краскопульты. Садово-парковая техника: Газонокосилки, Триммеры, Мотокосы, Культиваторы, Электро и Бензопилы, Пылесосы, Опрыскиватели. Все товары сертифицированы, на них распространяется гарантия производителя.
                        </p>
                    </div>
            </div>
        </div>
        <div class="body_menu">
            <ul><h1 class="Kat">Каталог</h1>
                <div class="body_menu_li">
                    <li><a href="" class="">Аккумуляторный инструмент</a></li>
                    <li>
                        <ul class="system">
                            <li><a href="" class="">Система 18 В</a></li>
                            <li><a href="" class="">Система 14,4 В</a></li>
                            <li><a href="" class="">Система 12 В</a></li>
                        </ul>
                    </li>
                    <li><a href="" class="">Лазерные уровни, дальномеры</a></li>
                    <li><a href="" class="">Сетевые дрели, шуруповёрты, миксеры</a></li>
                    <li><a href="" class="">Перфораторы и отбойные молотки</a></li>
                    <li><a href="" class="">Металлообработка</a></li>
                </div>
            </ul>
        </div>
    </div>
</div>
    <div class="footer">
    <div class="footet_logo1">
        <img src="images/visa_logo_40x13.png" alt="">
    </div>
    <div class="footet_logo2">
        <img src="images/mastercard_logo_40x24.png" alt="">
    </div>
    </div>
</body>
</html>