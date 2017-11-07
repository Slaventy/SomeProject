<?php
//для поиска в БД записи о пользователе
function SearchUserInBD(PDO $dbh, $userTable, $login, $password, $email){
    //подготавливаем запрос в БД
    $stmt = $dbh->prepare("SELECT * FROM $userTable WHERE user = ?
AND password = ? AND email = ?");

    $stmt->bindParam(1, $log);
    $stmt->bindParam(2, $pas);
    $stmt->bindParam(3, $eml);

    $log = $login;
    $pas = $password;
    $eml = $email;

    //вызов хранимой продцедуры
    $stmt->execute();
    //задаем параметры
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //получаем строку в виде ассоц массива
    $res = $stmt->fetchall();
    //проверяем возвращенный массив на наличие строки с пользователем
    if($res){
        return true;
    }else{
        return false;
    }
}