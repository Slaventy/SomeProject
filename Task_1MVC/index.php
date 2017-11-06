<?php
require "model.php";
$err = 0; //контроль ошибок

//Нажата кнопка регистрации
if(isset($_POST["submit"])){
    if(login($_POST["login"], base64_encode($_POST["password"]), $_POST["email"])){
        header("Location:index.php");
    }else{
        include "tpl/errorAuthorization.html";
    }

}

//нажата кнопка выхода из регистрации
if(isset($_POST["exit"])){
    logout();
    header("Location:index.php");
}

//проверка наличия регистрации пользователя
if(isset($_COOKIE["key"]) && $err == 0){
    include "tpl/exit.html";

}
//проверка отсутствия регистрации пользователя
if(!isset($_COOKIE["key"]) && $err == 0){
    include "tpl/authorization.html";

}