<?php
////login.php負責處理登入的操作

//config.php 是 DB 設定檔
$conn=require_once "config.php";
//可將變數儲存在session / 一個檔案只須寫一次 / 激活session的意思
session_start(); 

if($_SERVER["REQUEST_METHOD"]=="POST"){
    //接收Post訊息: 使用者名稱/密碼，儲存為變數$username/$password
    $username=$_POST["username"];
    $password=$_POST["password"];

    //增加 hash 可以提高安全性
    $password_hash=password_hash($password,PASSWORD_DEFAULT);

    //Processing form data when form is submitted
    //取得 DB 中的 user_data 表單的 user_name 欄位的 $username(前端過來的資料)
    //$sql 會顯示 $username(前端過來的資料)的 username
    $sql = "SELECT * FROM user_data WHERE user_name ='".$username."'";
    //[field_count] 回傳3個欄位/資料1筆
    $result=mysqli_query($conn,$sql);
    //Array 形式呈現，[user_id]/[user_name]/[user_password]
    $row = mysqli_fetch_assoc($result); 

    if(mysqli_num_rows($result)==1 && password_verify($row["user_password"], $password_hash)){
        //user_id 和 user_name 儲存至 session ，就可以攜帶至 welcome.php
        $_SESSION["id"] = $row["user_id"];
        $_SESSION["username"] = $row["user_name"];
        //當密碼輸入"成功"傳回跳出視窗
        message_success("登入成功 ! (Password Is Valid !)"); 
    }
    else{
        //當密碼輸入"錯誤"傳回跳出視窗
        message_alert("帳號或密碼錯誤 (Invalid Password)"); 
    }
}

//關閉 DB 連接
mysqli_close($link);

//當密碼輸入"錯誤"傳回跳出視窗，並回首頁
function message_alert($message) {
    //導回 index.php
    echo "<script>alert('$message');
            window.location.href='index.php';
        </script>"; 
    return true;
} 
//當密碼輸入"成功"傳回跳出視窗，並至 welcome.php
function message_success($message) {
    //導至 welcome.php
    echo "<script>alert('$message');
            window.location.href='welcome.php';
        </script>"; 
    return true;
} 
?>
