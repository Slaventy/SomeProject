<?php
//для поиска в БД записи о пользователе
function SearchUserInBD($dbh, $userTable, $login, $password, $email){
    //проверяет налие в БД записи о пользователе


    $stmt = $dbh->prepare("SELECT * FROM tableusers WHERE user = :log
AND password = :pas AND email = :eml");

    $stmt->bindParam(':log', $log);
    $stmt->bindParam(':pas', $pas);
    $stmt->bindParam(':eml', $eml);

    $log = $login;
    $pas = $password;
    $eml = $email;

    var_dump($stmt->execute());

//    $res = $con->query("SELECT * FROM $userTable WHERE user = '$login'
//AND password = '$password'
//AND email = '$email'");

//    возвращает true - проверка успешна false - проверка ошибочна
//    if($res->num_rows == 1){
//        //найдена строка
//        return true;
//    }else{
//        //строки нет
//        return false;
//    }
}