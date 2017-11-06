<?php
require "lib/connect.php";
//авторизация пользователя
function login($login, $password, $email){
    //проверка наличи записи в БД
    if(connectAndSearchBD($login, $password, $email)){
        //добавляем ключ в куки
        setcookie("key", "123");
        return true;
    }else{
        //ошибка авторизации
        return false;
    }
}

//выход из авторизации
function logout(){
    //удаление id из кук
    setcookie("key", false);
}