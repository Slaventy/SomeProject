<?php
$userlogin = "root";
$userpassword = "root";
$userBD = "Task1_users";
$userTable = "TableUsers";

$dsn = 'mysql:dbname=Task1_users;host=127.0.0.1:3306';
//соединение с БД

try {
    $dbh = new PDO($dsn, $userlogin, $userpassword);
} catch (PDOException $e) {
    echo 'Подключение не удалось: ' . $e->getMessage();
}

$stmt = $dbh->prepare("SELECT * FROM tableusers WHERE user = :log
AND password = :pas AND email = :eml");

$stmt->bindParam(':log', $log);
$stmt->bindParam(':pas', $pas);
$stmt->bindParam(':eml', $eml);

// вставим одну строку
$log = 'Scot';
$pas = 'MTIz';
$eml = 'scot@yandex.ru';
var_dump($stmt->execute());


$mas = $stmt->fetchAll();
var_dump($mas);