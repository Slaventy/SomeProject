<?php
require "DB/config.php";

//проверка на нажатие ввода полей
if($_POST["submit"]){

    //соединение с БД
    $conn = new mysqli(SERVER_NAME, USERNAME, PASSWORD, NAME_BASE_DATA);

    //проверяем статус соединения
    if($conn->connect_errno){
        printf ("Не удалось подключится: %s\n", $conn->connect_error);
        exit();
    }

    //запрос к БД на наличие логина пользователя
    echo $sql="SELECT * FROM ".NAME_TABLE_ORDER." WHERE ".COLUMN_2." = ".$_POST["login"];

    if($res = $conn->query($sql)){
        echo $res;
    }

    //закрытие соединения
    $conn->close();
}

//if ($_POST["login"] == $users["login"]){
//    if($_POST["password"] == $users["password"]){
//        if($_POST["email"]== $users["email"]){
//            //генерируем ключ пользователя
//            //сохраняем ключ пользователя в куках
//            echo "logOn";
//        }else{
//            echo "неверная почта";
//            sleep(10);
//            header("Location: index.php");
//        }
//    }else{
//        echo "неверный пароль";
//        sleep(10);
//        header("Location: index.php");
//    }
//}else{
//    echo "неверный логин";
//    sleep(10);
//    header("Location: index.php");
//}

if($_POST["exit"] === "выход"){
    //удаляем идентификатор пользователя из кук
    echo "exit";
    //возвращаемся на главную станицу
}