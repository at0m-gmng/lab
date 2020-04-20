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
    $price =  $_POST['product_price'];
    $tmp_picture = $_FILES['img']['tmp_name'];  
    
    if(($name=="") && ($commet=="") && ($picture=="") && ($price=="") ) {
        echo "<div class='ttt'>Заполнены не все поля формы, заполните форму правильно<br><a href='index4.php'>Заполнить</a></div>";
    }
    else {
        //              ВЫВОЗ В ФАЙЛ
        move_uploaded_file($tmp_picture, "images/".$picture);
        

        // если размер файла больше чем 100х100px, тогда выдаём ошибку
        // $info = getimagesize("images/".$picture);
        // if ($info[0] < 2000 && $info[1] < 2000) {
        //  // var_dump($info);    
        // //обращаемся к глобальной переменной SERVER
        // $ip=$_SERVER['REQUEST_METHOD'];
        // //формируем строку для записи
        // $str=$name.', '.$comment.', '.$picture."\r\n";
        // //открываем файл для записи.Если файл не существует-он будет создан
        // $arr  =  fopen('my_form_reports.txt', 'a+');
        // //записываем строку
        // fwrite ($arr, $str);
        // //закрываем файл
        // fclose ($arr);
        // }

        // else {
        //     echo "<div class='ttt'>Вы загрузили слишком большой файл, заполните форму правильно<br><a href='index4.php'>Заполнить</a></div>";

        // }

        function crop($image, $x_o, $y_o, $w_o, $h_o) {
            if (($x_o < 0) || ($y_o < 0) || ($w_o < 0) || ($h_o < 0)) {
              echo "Некорректные входные параметры";
              return false;
            }
            list($w_i, $h_i, $type) = getimagesize($image); // Получаем размеры и тип изображения (число)
            $types = array("", "gif", "jpeg", "png"); // Массив с типами изображений
            $ext = $types[$type]; // Зная "числовой" тип изображения, узнаём название типа
            if ($ext) {
              $func = 'imagecreatefrom'.$ext; // Получаем название функции, соответствующую типу, для создания изображения
              $img_i = $func($image); // Создаём дескриптор для работы с исходным изображением
            } else {
              echo 'Некорректное изображение'; // Выводим ошибку, если формат изображения недопустимый
              return false;
            }
            if ($x_o + $w_o > $w_i) $w_o = $w_i - $x_o; // Если ширина выходного изображения больше исходного (с учётом x_o), то уменьшаем её
            if ($y_o + $h_o > $h_i) $h_o = $h_i - $y_o; // Если высота выходного изображения больше исходного (с учётом y_o), то уменьшаем её
            $img_o = imagecreatetruecolor($w_o, $h_o); // Создаём дескриптор для выходного изображения
            imagecopy($img_o, $img_i, 0, 0, $x_o, $y_o, $w_o, $h_o); // Переносим часть изображения из исходного в выходное
            $func = 'image'.$ext; // Получаем функция для сохранения результата
            return $func($img_o, $image); // Сохраняем изображение в тот же файл, что и исходное, возвращая результат этой операции
          }
          copy ("images/".$picture, "images_min/".$picture);
          $picture_min = crop("images_min/".$picture, 0, 0, 100, 100);// Вызываем функцию

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
                $success = $connection->query ("INSERT INTO `products` (`id`, `id_category`, `product_name`,  `product_commit`, `product_price`, `product_image`, `product_image_min`) VALUES (NULL, '$category', '$name', '$comment', '$price', '$picture', '$picture_min')");
                    echo "<br>Результат:  $success";
                    echo  "<br>Выбрана категория: $category";\
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