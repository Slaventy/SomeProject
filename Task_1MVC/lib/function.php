<?php
function surchBD($con, $userTable, $login, $password, $email){

    //проверяет налие в БД записи о пользователе
    $res = $con->query("SELECT * FROM $userTable WHERE user = '$login'
AND password = '$password'
AND email = '$email'");

    //возвращает 0 - проверка успешна 1 - проверка ошибочна
    if($res->num_rows == 1){
        //найдена одна строка
        return 0;
    }else{
        //строки нет или больше одной
        return 1;
    }
}