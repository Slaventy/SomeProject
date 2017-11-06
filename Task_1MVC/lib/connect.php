<?php
require "function.php";
function connectAndSearchBD($login, $password, $email){
    //начальные данные для связи с БД
    $userlogin = "root";
    $userpassword = "root";
    $userBD = "Task1_users";
    $userTable = "TableUsers";

    $dsn = 'mysql:dbname='.$userBD.';host=127.0.0.1:3306';
    //соединение с БД
    try {
        $dbh = new PDO($dsn, $userlogin, $userpassword);
    } catch (PDOException $e) {
        echo 'Подключение не удалось: ' . $e->getMessage();
    }
    $answer = SearchUserInBD($dbh, $userTable, $login, $password, $email);

    return $answer;
}
