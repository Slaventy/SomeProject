<?php
require "function.php";

if($_GET["page"] == "game1"){
//создаем 2 игрока- 2 сессионных переменных
    //
}
//отправили число от 1 до 3
if(isset($_POST["submit"])){
    //запустить rand(1,3)
    $hit = rand(1,3);
    //
}
//В момент, когда у одного из персонажей ХП становится 0 и ниже, -
//перебрасывать на другую страницу при помощи переадресации (header) на страницу
//header("Location:index.php?module=games&page=game1over");
if(){

    header("Location:index.php?module=games&page=game1over");
}
//Не забываем, что для удобства пользователя необходимо выводить всю известную информацию,
//    то есть какой урон был нанесён, кто кому нанёс, сколько сейчас хп осталось у каждого игрока.
//Так же возможность начать игру заново.
if($_GET["module"]="games" && $_GET["page"]="game1over"){
    //вывод инф
    include "tpl/Game_Over.html";
    header("Location:index.php?page=game1");
}