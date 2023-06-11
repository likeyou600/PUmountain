<?php
	/**
	 * 這是一個使用No-IP DDNS服務的自動更新IP的程式
	 * 
	 */
	 
	//DDNS的帳號密碼
	$username = 'likeyou600@gmail.com';
	$password ='lovejay400';
	//DDNS的hostname
	$hostname = 'bakerychu.ddns.net';

	//取得連外的IP
	$ip = file_get_contents('http://web.ntust.edu.tw/~B10009009/ip.php');
	echo "IP={$ip}\r\n";
	if (!empty($ip)) {
		//更新hostname的IP
		$updateDDNS_prefix_url = "http://{$username}:{$password}@dynupdate.no-ip.com/nic/update?hostname={$hostname}&myip=";
		$result = file_get_contents("{$updateDDNS_prefix_url}{$ip}");
		echo "$result\r\n";
	}
?>
