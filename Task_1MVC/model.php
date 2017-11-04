<?php
require "lib/connect.php";
//авторизация пользователя
function login($login, $password, $email){
    //проверка наличи записи в БД
    if(connect($login, $password, $email) == 0){
        //добавляем ключ в куки
        setcookie("key", "123");
        return 0;
    }else{
        //ошибка авторизации
        return 1;
    }
}

//выход из авторизации
function logout(){
    //удаление id из кук
    setcookie("key", false);
}