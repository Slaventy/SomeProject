<?php
require "config.php";
require "function.php";
//устанавливаем соединение
$conn = new mysqli("localhost", USERNAME, PASSWORD);

//проверяем статус соединения
if($conn->connect_errno){
    printf ("Не удалось подключится: %s\n", $conn->connect_error);
    exit();
}

//создаем базу данных пользователей
$err = create_db_users($conn);
if($err == 0){
    printf("база данных успешно сформирована. $err\n");
}else{
    printf("при создании базы данных возникли ошибки. $err\n");
}

$errUs = createUserByAccessDB($conn);
if($errUs){
    printf("юзер успешно сформирован. $errUs\n");
}else{
    printf("не сформирован юзер. $errUs\n");
}

//закрываем соединение
$conn->close();