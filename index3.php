<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href= "style.css" rel="stylesheet">
    <title>Анкетные Данные</title>
</head>
<body>   
   <?php
    
    $name = $_POST['product_name'];
    $comment = $_POST['commint'];
    $picture = $_FILES['img']['name'];  
    $category = $_POST['category'];
    $tmp_picture = $_FILES['img']['tmp_name'];  
    
    if(($name=="") && ($commet=="") && ($picture=="")) {
        echo "<div class='ttt'>Заполнены не все поля формы, заполните форму правильно<br><a href='index4.php'>Заполнить</a></div>";
    }
    else {
        //              ВЫВОВ В ФАЙЛ
       /* move_uploaded_file($tmp_picture, "images/".$picture);

        // если размер файла больше чем 100х100px, тогда выдаём ошибку
        $info = getimagesize("images/".$picture);
        if ($info[0] < 100 && $info[1] < 100) {
         // var_dump($info);    
        //обращаемся к глобальной переменной SERVER
        $ip=$_SERVER['REQUEST_METHOD'];
        //формируем строку для записи
        $str=$name.', '.$comment.', '.$picture."\r\n";
        //открываем файл для записи.Если файл не существует-он будет создан
        $arr  =  fopen('my_form_reports.txt', 'a+');
        //записываем строку
        fwrite ($arr, $str);
        //закрываем файл
        fclose ($arr);

        else {
            echo "<div class='ttt'>Вы загрузили слишком большой файл, заполните форму правильно<br><a href='index4.php'>Заполнить</a></div>";

        }*/

        $server = $_SERVER['SERVER_ADDR'];
        $username = 'root';
        $password = '';
        $db_name= 'my_first';
        $charset = 'utf8';
    
        $connection = new mysqli ($server, $username, $password, $db_name);
    
        if ($connection->connect_error) {
    
            die  ( "Ошибка соединениея".$connection->$connect_error);
        }
            else {
                echo  "Вы подключились к Базе Данных";
                $success = $connection->query ("INSERT INTO `products` (`id`, `id_category`, `product_name`,  `product_commit`, `product_image`) VALUES (NULL, '$category', '$name', '$comment', '$picture')");
                    echo "<br>Результат:  $success";
                    echo  "<br>Выбрана категория: $category";
            }
        
        if (!$connection->set_charset($charset)) {
            echo  "Ошибка установки кодировки UTF8";
        }
    
        $connection->close();
    }       

?>
<div class="container2">
    <h2 class="form_title">Данные отправленны</h2>
    <div class="back">
        <a href="index4.php">Добавить еще один товар</a>
    </div>
     <div class="main">
        <a href="index.php">Вернуться на гавную страницу</a>
     </div>
    
</div>

         
</body>
</html>