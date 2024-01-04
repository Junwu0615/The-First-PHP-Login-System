<!DOCTYPE html>
<html>
    <head>
        <!-- 會員註冊 -->
        <!-- register.php 包含了簡單的檢核機制、註冊的表單 -->
        <meta charset='utf-8'>
        <title> 會員註冊 </title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <link href="css/web.css" rel="stylesheet">

        <script>
            function validateForm() {
                var x = document.forms["registerForm"]["password"].value;
                var y = document.forms["registerForm"]["password_check"].value;
                if(x.length<1){
                    alert("密碼長度不足");
                    return false;
                }
                if (x != y) {
                    alert("請確認密碼是否輸入正確");
                    return false;
                }
            }
        </script>
    </head>
    <body>
        <h1>會員註冊</h1>

        <form name="registerForm" method="post" action="register.php" onsubmit="return validateForm()">
            帳  號：
            <input type="text" name="username"><br/><br/>
            密  碼：
            <input type="password" name="password" id="password"><br/><br/>
            確認密碼：
            <input type="password" name="password_check" id="password_check"><br/><br/>
            <input type="submit" value="註冊" name="submit">
            <input type="reset" value="重設" name="submit">
            <input type ="button" onclick="location.href='index.php'" value="上一頁"></input>
        </form>

        <?php 
        $conn=require_once("config.php");
        //可將變數儲存在session / 一個檔案只須寫一次 / 激活session的意思
        session_start(); 

        if($_SERVER["REQUEST_METHOD"]=="POST"){
            //接收 Post 訊息: 使用者名稱/密碼，儲存為變數 $username / $password
            $username=$_POST["username"];
            $password=$_POST["password"];
            //檢查帳號是否重複
            $check="SELECT * FROM user_data WHERE user_name='".$username."'";
            if(mysqli_num_rows(mysqli_query($conn,$check))==0){
                //user_id 是自動遞增的，不需設值
                $sql="INSERT INTO user_data (user_id, user_name, user_password)
                    VALUES(NULL,'".$username."','".$password."')";
                
                if(mysqli_query($conn, $sql)){
                    echo "<br><br> 註冊成功!3秒後將自動跳轉頁面<br>";
                    //可手動跳轉
                    echo "<br> <a href='index.php'>未成功跳轉頁面請點擊此</a>";
                    //等3秒 跳至 index.php
                    header("refresh:3;url=index.php");
                    exit;
                }else{
                    echo "<br> Error creating table: " . mysqli_error($conn);
                }
            }
            else{
                echo "<br><br> 該帳號已有人使用!<br>3秒後將自動跳轉頁面<br>";
                //可手動跳轉
                echo "<br> <a href='register.php'>未成功跳轉頁面請點擊此</a>";
                //等3秒 跳至 register.php
                header("refresh:3;url=register.php");
                exit;
            }
        }
        //關閉 DB 連接
        mysqli_close($conn);
        ?>
    </body>
</html>