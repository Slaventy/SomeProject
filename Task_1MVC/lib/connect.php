<?php
require "function.php";
function connectAndSearchBD($login, $password, $email){
    //начальные данные для связи с БД
    $userlogin = "userTask1";
    $userpassword = "123";
    $userBD = "task1_users";
    $userTable = "tableusers";

    //подготавливаем соединение с БД
    $dsn = 'mysql:dbname='.$userBD.';host=127.0.0.1:3306';

    //соединение с БД
    try {
        $dbh = new PDO($dsn, $userlogin, $userpassword);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Подключение не удалось: ' . $e->getMessage();
    }
    //поиск пользователя в БД
    $answer = SearchUserInBD($dbh, $userTable, $login, $password, $email);
    //закрываем соединение
    $dbh=null;

    return $answer;
}
