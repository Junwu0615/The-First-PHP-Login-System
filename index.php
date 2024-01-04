<!DOCTYPE html>
<html>
    <head>
        <!-- 登入介面 -->
        <meta charset='utf-8'>
        <title> 登入介面 </title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
         <link href="css/web.css" rel="stylesheet"> 
    </head>
    <body>
        <h1> 登入系統 (Login) </h1>
        <form method="post" action="login.php">
            帳  號：
            <input type="text" name="username"><br/><br/>
            密  碼：
            <input type="password" name="password"><br/><br/>
            <input type="submit" value="登入" name="submit"><br/><br/>
            <a href="register.php">還沒有帳號？現在就註冊！</a>
        </form>
    </body>
</html>
