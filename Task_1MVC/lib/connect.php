<?php
require "function.php";
function connect($login, $password, $email){
    //начальные данные для связи с БД
    $userlogin = "root";
    $userpassword = "root";
    $userBD = "Task1_users";
    $userTable = "TableUsers";

    //соединение с БД
    $con = new mysqli("localhost", $userlogin, $userpassword, $userBD);
    $answer = surchBD($con, $userTable, $login, $password, $email);

    //закрытие соединения с БД
    $con->close();
    return $answer;
}
