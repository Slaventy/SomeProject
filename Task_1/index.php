<html>
<body>
<!-- выводим поля для аутитенфикации пользователя -->
<!-- для отображения формы необходимо наличие в куках идентификатора пользователя-->
    <form action="handler.php" method="post">
        <p><input required name="login" type="text"> Login</p>
        <p><input required name="password" type="text"> Password</p>
        <p><input  name="email" type="text"> e-mail</p>
        <p><input  type="submit"></p>
    </form>
<!-- при наличии идентификатора пользовтеля выводится -->
<form action="handler.php" method="post">
    <input type="submit" value="выход" name="exit">
</form>
</body>
</html>