<html>
<body>
<!-- выводим поля для аутитенфикации пользователя -->
<!-- для отображения формы необходимо наличие в куках идентификатора пользователя-->
    <form action="hendler.php" method="post">
        <p><input title="login" required name="login" type="text"> Login</p>
        <p><input title="password" required name="password" type="text"> Password</p>
        <p><input title="email" name="email"  type="text"> e-mail</p>
        <p><input title="submit" name="submit" type="submit" ></p>
    </form>
<!-- при наличии идентификатора пользовтеля выводится -->
<form action="handler.php" method="post">
    <input type="submit" value="выход" name="exit">
</form>
</body>
</html>