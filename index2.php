<?php
    $server = $_SERVER['SERVER_ADDR'];
    $username = 'root';
    $password = '';
    $db_name= 'my_first';
    $charset = 'utf8';

    $name = '1sass23';
    $commit = "asdsa";
    $picture = 'asd';


    $connection = new mysqli ($server, $username, $password, $db_name);

    if ($connection->connect_error) {

        die  ( "Ошибка соединениея".$connection->$connect_error);
    }
        else {
            echo  "Вы подключились к Базе Данных";
            $success = $connection->query ("INSERT INTO `products` (`id`, `product_name`, `product_commit`, `product_image`) VALUES (NULL, '$name', '$commit', '$picture')");
                echo "<br>Результат:  $success";
                }
    
    if (!$connection->set_charset($charset)) {
        echo  "Ошибка установки кодировки UTF8";
    }

    $connection->close();
?>