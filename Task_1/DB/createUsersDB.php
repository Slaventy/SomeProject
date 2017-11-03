<?php
require "config.php";
require "initial_data.php";

//устанавливаем соединение с БД
$conn = new mysqli("localhost", USERNAME, PASSWORD);

//проверяем статус соединения
if($conn->connect_errno){
    printf ("Не удалось подключится: %s\n", $conn->connect_error);
    exit();
}

//удаляем предидущюю БД
if($conn->query("DROP DATABASE ".NAME_BASE_DATA) === TRUE){
    printf("Предыдущяя БД удалена\n");
}else{
    printf("Предыдущуу БД удалить не удалось: %s\n", $conn->connect_error);
}
//создаем новую БД
if($conn->query("CREATE DATABASE ".NAME_BASE_DATA) === TRUE){
    printf("БД создана\n");
}else{
    printf("БД создать не удалось: %s\n", $conn->connect_error);
    exit();
}
//устанавливаем БД как текущюю
if($conn->query("USE ".NAME_BASE_DATA) === TRUE){
    printf("БД установлена как текущяя\n");
}else{
    printf("БД установить как текущюю не удалось: %s\n", $conn->connect_error);
    exit();
}
//создаем таблицу
if($conn->query("CREATE TABLE ".NAME_TABLE_ORDER."(".COLUMN_1." INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,".
        COLUMN_2." VARCHAR(20),".COLUMN_3." VARCHAR(20),".COLUMN_4." VARCHAR(20))") === TRUE){
    printf("Таблица создана\n");
}else{
    printf("Таблицу создать не удалось: %s\n", $conn->connect_error);
    exit();
}
//заполняем поля таблицы
foreach (INITIAL_BASE_OF_USERS as $val) {
    $pas=base64_encode($val[COLUMN_3]);
        if ($conn->query("INSERT INTO " . NAME_TABLE_ORDER ." VALUES ('".$val[COLUMN_1].
                "','".$val[COLUMN_2]."','".$pas."','".$val[COLUMN_4]."')") === TRUE) {
            printf("Запись внесена\n");
        } else {
            printf("запись не внесена: %s\n", $conn->connect_error);
            exit();
        }
}

$conn->close();