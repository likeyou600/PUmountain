<?php
    ob_start();
    echo ("設定cookie的內容值為陳則閔s10817356");
    setcookie("username", "陳則閔s10817356", time()+3600); //儲存Cookie，有效：1個小時。
ob_end_flush();
?>
<html>
<head>
<title>Ch06--儲存Cookie</title>
</head>
<body>
<br>
<a href="cookie.php">連結到存取Cookie的網頁</a>
</body>
</html>