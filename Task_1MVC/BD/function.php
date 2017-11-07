<?php
require "initial_data.php";

function create_db_users($conn){
    $err = "0";
    //удаляем предидущюю БД
    if($conn->query("DROP DATABASE ".NAME_BASE_DATA) === TRUE){
        $err .= "0";
    }else{
        $err .= "1";
        return $err;
    }
    //создаем новую БД
    if($conn->query("CREATE DATABASE ".NAME_BASE_DATA) === TRUE){
        $err .= "0";
    }else{
        $err .= "1";
        return $err;
    }
    //устанавливаем БД как текущюю
    if($conn->query("USE ".NAME_BASE_DATA) === TRUE){
        $err .= "0";
    }else{
        $err .= "1";
        return $err;
    }
    //создаем таблицу
    if($conn->query("CREATE TABLE ".NAME_TABLE_ORDER."(".COLUMN_1." INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,".
            COLUMN_2." VARCHAR(20),".COLUMN_3." VARCHAR(20),".COLUMN_4." VARCHAR(20))") === TRUE){
        $err .= "0";
    }else{
        $err .= "1";
        return $err;
    }
    //заполняем поля таблицы
    foreach (INITIAL_BASE_OF_USERS as $val) {
        $pas=base64_encode($val[COLUMN_3]);
        if ($conn->query("INSERT INTO " . NAME_TABLE_ORDER ." VALUES ('".$val[COLUMN_1].
                "','".$val[COLUMN_2]."','".$pas."','".$val[COLUMN_4]."')") === TRUE) {
            $err .= "0";
        } else {
            $err .= "1";
            return $err;
        }
    }
    return $err;
}

function createUserByAccessDB($conn){
    $sql1 = "DROP USER 'userTask1'";
    $sql2 = "CREATE USER 'userTask1' IDENTIFIED BY '123'";
    $sql3 = "GRANT SELECT ON ".NAME_BASE_DATA.".".NAME_TABLE_ORDER." TO 'userTask1'";
    $sql4 = "FLUSH PRIVILEGES";
    $err = "";
    if($conn->query($sql1)){
        $err .= "0";
    }else{
        $err .= "1";
    }
    if($conn->query($sql2)){
        $err .= "0";
    }else{
        $err .= "1";
    }
    if($conn->query($sql3)){
        $err .= "0";
    }else{
        $err .= "1";
    }
    if($conn->query($sql4)){
        $err .= "0";
    }else{
        $err .= "1";
    }
    return $err;
}
