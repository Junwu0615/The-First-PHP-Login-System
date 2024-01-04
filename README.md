<a href='https://github.com/Junwu0615/The-First-PHP-Login-System'><img alt='GitHub Views' src='https://views.whatilearened.today/views/github/Junwu0615/The-First-PHP-Login-System.svg'> 
<a href='https://github.com/Junwu0615/The-First-PHP-Login-System'><img alt='GitHub Clones' src='https://img.shields.io/badge/dynamic/json?color=success&label=Clone&query=count&url=https://gist.githubusercontent.com/Junwu0615/ab14c4824b25cc2eb94c56e63b133e32/raw/The-First-PHP-Login-System_clone.json&logo=github'> </br>
[![](https://img.shields.io/badge/Language-PHP-blue.svg?style=plastic)](https://www.php.net/)
[![](https://img.shields.io/badge/Language-MySQL-blue.svg?style=plastic)](https://www.mysql.com/) 
[![](https://img.shields.io/badge/Project-LoginSystem-blue.svg?style=plastic)](https://github.com/Junwu0615/The-First-PHP-Login-System)
[![](https://img.shields.io/badge/Package-Wampserver-green.svg?style=plastic)](https://wampserver.aviatechno.net/?lang=en&prerequis=afficher) </br>


## 用 WampServer 建立我的第一支 PHP 登入系統

### A.　前言
從 0-1 自學如何架起後端來串前端，真的是非常困難...同盲人摸象。摸一段時間後仍持續原地打轉，且苦於沒有適合的敲門磚，好在終於在[網上找到一套合適我的](https://jam68ty.github.io/BucketTalk/post/php-mysql-login/)。其中有神一般的隊友 Google、Jack 大大，以及善於分享的大神們讓我看到一絲曙光，因此我也記錄本篇我是怎麼弄出我的第一支登入網頁，給後來的人一個參考方向。

### B.　使用環境
- VScode : 作為我的程式編譯環境，但除錯透過 WampServer。
- WampServer : 它是一個整合套件，其中包括 ( **PHP** / **MySQL** / MariaDB / **Apache** )。

### C.　安裝 WampServer
- [WampServer 下載網址](https://sourceforge.net/projects/wampserver/)，按照預設安裝即可。
- 啟動時若告訴缺少下列內容，去 [此連結](https://wampserver.aviatechno.net/?lang=en&prerequis=afficher) 下載。
  - VC 2010 SP1 Package (x64)
  - VC 2012 Up 4 (x64)
  - VC 2013 Up 5 (x64)
  - VC 2015-2022 (VC17 x64)

### D.　環境使用
- 專案放置位置
  - 將要寫的程式放置在安裝的目錄上，WampServer 預設位置為 `C:\wamp64\www\` 。
  - 假設將你專案名稱是 `The-First-PHP-Login-System`，那路徑為 `C:\wamp64\www\The-First-PHP-Login-System\` 。
- 開啟除錯環境
  - 啟動時他預設會用 MS edge 開啟，用不習慣可以自己選擇其他瀏覽器，並輸入 `127.0.0.1` 。
  - 若是輸入後呈現內容不是正確頁面，可能是預設 port 被其他應用程式搶了。
  - 先去載個 [好用的查詢 Port 軟體](https://learn.microsoft.com/zh-tw/sysinternals/downloads/tcpview)，它可以查看本地所有 Port 的分配情況
    - 查看欄位 "Local Port" ，並按照降冪排序，檢查 `80 Port` 是否被使用。
    - 若被使用了，則透過 WampServer 來修改本身預設的 Port 號。
      - 路徑 : 右下角工作狀態 -> WampServer(右鍵) -> 工具 (Tools) -> 切換到  `8080 ` Port (Use the port other than `8080`) -> 重新整理 (Refresh)
      - 這樣在你的瀏覽器就可以直接輸入 `127.0.0.1:8080` 。
      - 進入你的專案 `127.0.0.1:8080/The-First-PHP-Login-System/` 。
        - 預設會自動導至 `index.php` 。
- 使用資料庫 : phpMyAdmin (MySQL)
  - 開啟方式有2種
    - http://localhost:8080/phpmyadmin/
    - 路徑 : 右下角工作狀態 -> WampServer(左鍵) -> phpmyadmin -> phpmyadmin 版本
  - 預設帳密為 帳: root | 密: None
  - 建立資料庫並命名 (本篇名稱設立為: `user_data`) ，會在 `流程E` 中的 config.php 設定。
  - 建立資料表用來儲存本篇所需的內容，具體會使用到 :
    - `user_id` | `int` | `AUTO_INCREMENT` (打勾AI選項)
    - `user_name` | `text`
    - `user_password` | `text`

### E.　檔案說明

| 檔案 | 是否有前端內容 | 是否有後端內容 |
| :---: | :---: | :---: |
| `config.php` | X | O |
| `register.php` | O | O |
| `index.php` | O | O |
| `login.php` | X | O |
| `logout` | X | O |
| `welcome.php` | O | O |
| `phpinfo.php` | X | O |
| `web.css` | O | X |
| `/js/all file` | O | X |
| `/css/all file (Except web.css)` | O | X |

</br>

- `config.php`
  - 寫 DB 訊息的地方，並確認是否連接上。
  ```
  define('DB_SERVER', 'localhost');//本地
  define('DB_USERNAME', 'your SQL account'); //SQL 帳號
  define('DB_PASSWORD', 'your SQL password'); //SQL 密碼
  define('DB_NAME', 'your DB name'); //DB 的名字
  ```
- `register.php`
  - 註冊頁面，和處理註冊訊息的地方。
  - 具體是透過 HTML 的 form Post 傳輸方式，這種方法一定要有 `input type="submit"` 做送出的動作。
    - `Get` 會透過網址傳遞訊息，**非常透明/很不安全**。
    - `Post` 透過封包傳送，相對安全。
- `index.php`
  - 登入介面，將 `帳號密碼` 由前端 (index.php) 傳送到後端 (login.php)。
    - 同 register.php 一樣使用 HTML 的 form Post 傳輸方式。
- `login.php`
  - 用 if($_SERVER["REQUEST_METHOD"]=="POST") 收到登入資訊後，由後端去 DB 判斷是否有該資料。若有，即審核通過，並導至 `welcome.php` 介面；若無，則跳出錯誤視窗。
  - 一些功能 :
    - 一般的密碼比對
      ```
      //從 DB 撈出該使用者的密碼 $row["user_password"]
      //前端 summit 來的密碼 $password
      if(mysqli_num_rows($result)==1 && $password==$row["user_password"])
      ```
    - [加入哈希的密碼比對](https://tools.wingzero.tw/article/sn/324)，不確定用法對不對 (在想是否在前端就要做完加密動作才傳來後端?)
      ```
      //對前端 summit 來的密碼進行哈希加密處理
      $password_hash=password_hash($password,PASSWORD_DEFAULT);
      //透過 password_verify 此方法可以比對經由哈希處理過後的密碼，若是一致，會回傳True，反之False
      if(mysqli_num_rows($result)==1 && password_verify($row["user_password"], $password_hash))
      ```
    - 跳出視窗
      - 成功導至 `welcome.php` (歡迎頁面)。
      - 失敗導回 `index.php` (首頁)。
- `logout.php`
  - 登出操作由後端判斷。
  - 當被傳送進來 logout.php 會進行清除: `all session` / `session array` 。
  - 並導回 `index.php`。
- `welcome.php`
  - 隨便寫的前端，沒啥好說的。
  - login.php 傳過來的 session 訊息有 User ID / User Name 。
    - 頁面顯示 `User ID` 和 `User Name` 以及 `登出按鈕`。
    - 登出後即導回 `index.php`。
- `phpinfo.php`
  - 查看 php 目前安裝配置。
  - 本篇不會用到，因為是透過 WampServer 啟動。
- `web.css`
  - 簡單的前端模板內容: 置中...等。
- `/js/all file`
  - 來自 css 套版資源。
- `/css/all file (Except web.css)`
  - 來自 css 套版資源。

### F.　參考來源
- [Chia Chen | PHP-MySQL系列 登入與註冊系統](https://jam68ty.github.io/BucketTalk/post/php-mysql-login/)
- [css 套版資源 | Templatemo.com](https://templatemo.com/)
