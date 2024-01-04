<a href='https://github.com/Junwu0615/The-First-PHP-Login-System'><img alt='GitHub Views' src='https://views.whatilearened.today/views/github/Junwu0615/The-First-PHP-Login-System.svg'> 
<a href='https://github.com/Junwu0615/The-First-PHP-Login-System'><img alt='GitHub Clones' src='https://img.shields.io/badge/dynamic/json?color=success&label=Clone&query=count&url=https://gist.githubusercontent.com/Junwu0615/ab14c4824b25cc2eb94c56e63b133e32/raw/The-First-PHP-Login-System_clone.json&logo=github'> </br>
[![](https://img.shields.io/badge/Language-PHP-blue.svg?style=plastic)](https://www.php.net/)
[![](https://img.shields.io/badge/Language-MySQL-blue.svg?style=plastic)](https://www.mysql.com/) 
[![](https://img.shields.io/badge/Project-LoginSystem-blue.svg?style=plastic)](https://github.com/Junwu0615/The-First-PHP-Login-System)
[![](https://img.shields.io/badge/Package-Wampserver-green.svg?style=plastic)](https://wampserver.aviatechno.net/?lang=en&prerequis=afficher) </br>


## 用 WampServer 建立我的第一支 PHP 登入系統

### A.　前言

從 0-1 自學如何架起後端來串前端，真的是非常困難...同盲人摸象。摸一段時間後仍持續原地打轉，且苦於沒有適合的敲門磚，好在終於在[網上找到一套合適我的](https://jam68ty.github.io/BucketTalk/post/php-mysql-login/)。其中有神一般的隊友 Google、Jack 大大，以及善於分享的大神們讓我看到一絲曙光，因此用本篇來記錄我是如何弄出我的第一支登入網頁，給後來的人一個參考方向。

### B.　使用環境

- VScode : 作為我的程式編譯環境，但除錯透過 WampServer。
- WampServer : 它是一個整合套件，其中包括 ( **PHP** / **MySQL** / **Apache** / MariaDB )。

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
  - 假設你專案名稱是 `The-First-PHP-Login-System`，路徑則為 `C:\wamp64\www\The-First-PHP-Login-System\` 。
- 開啟除錯環境
  - 啟動時，預設會用 MS Edge 開啟，用不習慣可以選擇其他瀏覽器，並輸入 `127.0.0.1` 。
  - 若是輸入後呈現內容不是正確頁面，可能是預設 Port 被其他應用程式占用。
  - 先去載個 [好用的查詢 Port 軟體](https://learn.microsoft.com/zh-tw/sysinternals/downloads/tcpview)，它可以查看本地所有 Port 的分配情況
    - 查看欄位 "Local Port" ，並按照降冪排序，檢查 `80 Port` 是否被使用。
    - 若被使用，則透過 WampServer 來修改本身預設的 Port 號。
      - 路徑 : 右下角工作狀態 > WampServer(右鍵) > 工具 (Tools) > 切換到  `8080` Port (Use the port other than `8080`) > 重新整理 (Refresh)
      - 這樣在你的瀏覽器就可以直接輸入 `127.0.0.1:8080` 。
      - 進入你的專案 `127.0.0.1:8080/The-First-PHP-Login-System/` 。
        - 預設會自動導至 `index.php` 。
- 使用資料庫 : phpMyAdmin (MySQL)
  - 開啟方式有 2 種
    - http://localhost:8080/phpmyadmin/
    - 路徑 : 右下角工作狀態 > WampServer(左鍵) > phpmyadmin > phpmyadmin 版本
  - 預設帳密為 帳: root | 密: None
  - 建立 Database (DB) 並命名 (本篇名稱設立為: `the-first-php-login-system`)，會在 `流程E` 中的 `config.php` 設定。
  - 建立 Datasheet 並命名 (本篇名稱設立為: `user_data`)，會在 `流程E` 中的 `login.php` 、 `register.php` 使用。
  - Datasheet 用來儲存本篇所需的內容，具體會使用下列 3 種 :
    - `user_id` | `int` | `AUTO_INCREMENT` (打勾 AI 選項)
    - `user_name` | `text`
    - `user_password` | `text`
    - <img src="https://github.com/Junwu0615/The-First-PHP-Login-System/blob/main/sample_img/DB.jpg"/>

### E.　檔案說明

本篇是「前後端不分離」的架構，但個人希望能弄成「前後端分離」來切個乾乾淨淨 ! 恩...留給未來搞。

| 檔案 | 是否有前端內容 | 是否有後端內容 |
| :---: | :---: | :---: |
| `config.php` | X | O |
| `register.php` | O | O |
| `index.php` | O | O |
| `login.php` | X | O |
| `logout` | X | O |
| `welcome.php` | O | O |
| `web.css` | O | X |
| `/js/all file` | O | X |
| `/css/all file (Except web.css)` | O | X |
| `php_info.php` | - | - |

</br>

- `config.php` : 寫 DB 訊息的地方，並確認是否連接上。
  ```
  define('DB_SERVER', 'localhost');//本地
  define('DB_USERNAME', 'your SQL account'); //SQL 帳號
  define('DB_PASSWORD', 'your SQL password'); //SQL 密碼
  define('DB_NAME', 'your DB name'); //DB 的名字
  ```
- `register.php` : 註冊頁面，同時也是處理註冊訊息的地方。
  - 前端具體是透過 HTML 的 form Post 傳輸方式，這種方法一定要有 `input type="submit"` 做送出的動作。
    - `Get` 會透過網址傳遞訊息，**非常透明/很不安全**。
    - `Post` 透過封包傳送，相對安全。
  - 此檔案同時也包括後端的程式，因此會用 `if($_SERVER["REQUEST_METHOD"]=="POST")` 接受註冊訊息。
    - 將接受的內容 (使用者名稱 / 密碼) 用變數儲存為 `$username` `$password`
    - `mysqli_num_rows(mysqli_query($conn,$check))` 此方法能檢查DB是否有該使用者訊息 ($check 是抓 user_name)，若是已有該帳戶回傳 1，反之 0。
    - 若是新用戶則...
       - 將新的使用者訊息新增至 DB 當中 `$sql="INSERT INTO user_data (user_id, user_name, user_password)` 。
       - 要注意的是欄位 `user_id`，由於設定的關係，系統自動更新其數值，因此不用餵值，用 None 即可。
       - 用 `if(mysqli_query($conn, $sql))` 來新增該筆資料，若是新增成功則跳轉頁面回 `index.php`，否則報錯。
    - 若是舊用戶則...
       - 跳出已註冊訊息後，跳轉頁面回 `register.php` 。
- `index.php` : 登入頁面，將 **帳號密碼** 由前端 (index.php) 傳送到後端 (login.php)。
  - 同 register.php 一樣使用 HTML 的 form Post 傳輸方式。
- `login.php` : 處理登入操作由後端進行。
  - 用 `if($_SERVER["REQUEST_METHOD"]=="POST")` 收到登入資訊後，由後端去 DB 判斷是否有該資料。若有，即審核通過，並導至 `welcome.php` 頁面；若無，則跳出錯誤視窗。
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
- `logout.php` : 處理登出操作由後端進行。
  - 當被傳送進來 logout.php 會進行清除: `all session` / `session array` 。
  - 並導回 `index.php`。
- `welcome.php` : 隨便寫的前端...
  - login.php 傳過來的 session 訊息有 User ID / User Name 。
    - 頁面顯示 `User ID` 和 `User Name` 以及 `登出按鈕`。
    - 登出後即導回 `index.php`。
- `web.css` : 簡單的前端模板內容: 置中...等。
- `/js/all file` : 來自 CSS 套版資源。
- `/css/all file (Except web.css)` : 來自 CSS 套版資源。
- `php_info.php` : 查看 php 目前安裝配置。
  - 本篇不會用到，因為是透過 WampServer 啟動。

### F.　程式運行過程

| 情境 | 流程 |
| :--: | :-- |
| 登入 > 登出 | `index.php` > `login.php`(`config.php`) > `welcome.php` > `logout`(Back to `index.php`) |
| 註冊 > 登入 > 登出 | `index.php` > `register.php`(`config.php`) > `index.php` > `login.php`(`config.php`) > `welcome.php` > `logout`(Back to `index.php`) |

### G.　情境導覽

今天我是新用戶，想設定的名稱: `Ping_Chun` | 密碼: `2024_1_4` 。
- I.　登入頁面-進行登入 : index.php 。
  - <img height=185 width=450 src="https://github.com/Junwu0615/The-First-PHP-Login-System/blob/main/sample_img/00.jpg"/>
  - <img height=139 width=450 src="https://github.com/Junwu0615/The-First-PHP-Login-System/blob/main/sample_img/01.jpg"/>
  - 理所當然會顯示報錯。
- II.　註冊頁面-註冊新帳號 : register.php 。
  - <img height=334 width=450 src="https://github.com/Junwu0615/The-First-PHP-Login-System/blob/main/sample_img/02.jpg"/>
  - <img height=320 width=450 src="https://github.com/Junwu0615/The-First-PHP-Login-System/blob/main/sample_img/03.jpg"/>
  - 可看到 `無人註冊，並顯示已註冊成功` 。
- III.　查看 DB 是否已有該帳戶。
  - <img height=108 width=450 src="https://github.com/Junwu0615/The-First-PHP-Login-System/blob/main/sample_img/04.jpg"/>
  - 確認已新增， `user_id = 20` 的新用戶。
- Ⅳ.　再次用同一支帳號註冊。
  - <img height=340 width=450 src="https://github.com/Junwu0615/The-First-PHP-Login-System/blob/main/sample_img/05.jpg"/>
  - 系統 `跳出已有人註冊` 。
- V.　再次進行登入動作。
  - <img height=141 width=450 src="https://github.com/Junwu0615/The-First-PHP-Login-System/blob/main/sample_img/06.jpg"/>
  - 進入歡迎頁面 : welcome.php !
  - <img height=484 width=816 src="https://github.com/Junwu0615/The-First-PHP-Login-System/blob/main/sample_img/07.jpg"/>
  - 右上角可以看到 User ID + Name，以及登出鈕。
  - 登出即導回 `登入頁面` 。

### H.　參考來源
- [Chia Chen | PHP-MySQL系列 登入與註冊系統](https://jam68ty.github.io/BucketTalk/post/php-mysql-login/)
- [CSS 套版資源 | Templatemo.com](https://templatemo.com/)
