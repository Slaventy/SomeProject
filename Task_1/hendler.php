<?php
require "config.php";

//проверка полей аутитенфикации на соответствие зарегистрированному пользователю
if ($_POST["login"] == $users["login"]){
    if($_POST["password"] == $users["password"]){
        if($_POST["email"]== $users["email"]){
            //генерируем ключ пользователя
            //сохраняем ключ пользователя в куках
            echo "logOn";
        }else{
            echo "неверная почта";
            sleep(10);
            header("Location: index.php");
        }
    }else{
        echo "неверный пароль";
        sleep(10);
        header("Location: index.php");
    }
}else{
    echo "неверный логин";
    sleep(10);
    header("Location: index.php");
}

if($_POST["exit"] == "выход"){
    //удаляем идентификатор пользователя из кук
    echo "exit";
    //возвращаемся на главную станицу
}