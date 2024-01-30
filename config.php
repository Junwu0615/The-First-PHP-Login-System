<?php
//config.php是與資料庫有關的設定檔
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
/* define() 函數定義一個常量。
在設定以後，常量的值無法更改
常量名不需要開頭的美元符號 ($)
作用域不影響對常量的訪問
常量值只能是字符串或數字 */

define('DB_SERVER', 'localhost');//本地
define('DB_USERNAME', 'your SQL account'); //SQL 帳號
define('DB_PASSWORD', 'your SQL password'); //SQL 密碼
define('DB_NAME', 'your DB name'); //DB 的名字
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// 輸入中文也 OK 的編碼
mysqli_query($link, 'SET NAMES utf8');
// 檢查 DB 連接
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
else{
    //這樣就可以用其他的程式來呼叫 DB 的內容
    return $link;
}
?>