<?php
require "model.php";
$err = 0; //контроль ошибок

//Нажата кнопка регистрации
if(isset($_POST["submit"])){
    $err = login($_POST["login"], base64_encode($_POST["password"]), $_POST["email"]);
    if($err == 0){
        header("Location:index.php");
    }else{
        include "tpl/Shablon3.html";
    }

}

//нажата кнопка выхода из регистрации
if(isset($_POST["exit"])){
    logout();
    header("Location:index.php");
}

//проверка наличия регистрации пользователя
if(isset($_COOKIE["key"]) && $err == 0){
    include "tpl/Shablon2.html";

}
//проверка отсутствия регистрации пользователя
if(!isset($_COOKIE["key"]) && $err == 0){
    include "tpl/Shablon1.html";

}