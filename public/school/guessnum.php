<h1>猜數字遊戲</h1>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
    <input type="number" min="0" max="100" name="num" step="1" placeholder="隨便猜">
    <button type="submit">試一試</button>
</form>

<?php
session_start();
// 1.判斷是否已經在session產生了隨機數或則是重新請求網址
if(empty($_SESSION['num']) || empty($_GET['num'])){
    $num = rand(0,100);
    $_SESSION['num'] = $num;
    echo "隨機數是$num";
}else{
 // 2.獲取用戶選擇的數，將拿到的數與選擇的數做比較
    $result = (int)$_SESSION['num'] - (int)$_GET['num'];
        if($result==0){
            
            unset($_SESSION['num']);
            unset($_SESSION['count']);
            echo "答對了";
        }else{
            $_SESSION['count'] = $count+1;
            echo "請繼續猜";
        }
    }

?>