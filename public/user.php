<?php
$host = 'localhost';
$user = 'bakery';
$passwd = 'bakery';
$database = 'laravel';
//實例化mysqli(資料庫路徑, 登入帳號, 登入密碼, 資料庫)
$connect = new mysqli($host, $user, $passwd, $database);
 
if ($connect->connect_error) {
    die("連線失敗: " . $connect->connect_error);
}
echo "連線成功<br>";
 
//設定連線編碼，防止中文字亂碼
$connect->query("SET NAMES 'utf8'");
 
    $a=1;
    for($a;$a<2;$a++){
$selectSql = "SELECT * FROM users WHERE id = $a";
//呼叫query方法(SQL語法)
$memberData = $connect->query($selectSql);
//有資料筆數大於0時才執行
if ($memberData->num_rows > 0) {
//讀取剛才取回的資料
    while ($row = $memberData->fetch_assoc()) {
        
        echo '<pre>',print_r($row),'<pre>';
    }
} }
?>