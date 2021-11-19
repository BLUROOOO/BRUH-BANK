<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BRUH. BANK S.A. | PANEL GŁÓWNY</title>
	<link rel="stylesheet" type="text/css" href="../styles/style.css">
	<link rel="icon" href="../logo_icons/bank_logo.png">
</head>
<body>
	<header>
		<a href="../PHP/main.php">BRUH. BANK S.A. | PANEL GŁÓWNY</a>
		<button class="header_buttons"><a href="logout_info.php">WYLOGUJ</a></button>
	</header>
	<article id="article5">
		<div id="stan_konta">
			TWOJE WYDATKI
			<hr class="hr">
			
		</div>
		<div class="stats">
			<div class="staty" style="word-wrap: break-word;">
				NUMER KONTA <hr class="hr"> <?php AccountNumber(); ?>
			</div><br>
			<div class="staty">
				STAN KONTA [PLN] <hr class="hr"> <?php Balancezl(); ?>
			</div><br>
			<div class="staty">
				STAN KONTA [$] <hr class="hr"> <?php Balanceusd(); ?>
				
			</div><br>
			<div class="staty">
				STAN KONTA [€] <hr class="hr"> <?php Balanceeur(); ?>
			</div>
		</div>
		<div class="opcje">
			<button class="option_buttons"><a href="../PHP/send_money.php">WYŚLIJ PRZELEW</a></button><br><br>
			<button class="option_buttons"><a href="../PHP/order_cards.php">ZAMÓW KARTĘ</a></button><br><br>
			<button class="option_buttons"><a href="../PHP/take_loan.php">WEŹ KREDYT</a></button><br><br>
			<button class="option_buttons"><a href="../PHP/pay_instalment.php">SPŁAĆ RATĘ</a></button>
		</div>
		<div id="history">
			HISTORIA TRANSAKCJI
			<hr class="hr">
		</div>
	</article>
	<div id="news">
	<marquee scrolldelay="70">
		Nowość! Pożyczka Stabilna (RRSO 9,02%) | Decydujesz. Zlecasz. Kontrolujesz. Nieograniczony dostęp do konta w BRUH. BANK | Nawet do 150 zł premii dla studentów od BRUH. BANK | Dodatkowe pieniądze na Twoim koncie. Nie korzystasz? Nie płacisz!
	</marquee>
	</div>
	<footer>
		&copy; 2021 BRUH. BANK S.A. Wszelkie prawa zastrzeżone.
		<a href="https://youtu.be/dQw4w9WgXcQ" target="_blank"><img class="logo" src="../logo_icons/yt_logo.png" alt="yt_logo"></a>
		<a href="https://www.reddit.com/" target="_blank"><img class="logo" src="../logo_icons/reddit_logo.png" alt="reddit_logo"></a>
		<a href="https://pl.linkedin.com/" target="_blank"><img class="logo" src="../logo_icons/linkedin_logo.png" alt="linkedin_logo"></a>
		<a href="https://twitter.com/?lang=pl" target="_blank"><img class="logo" src="../logo_icons/twitter_logo.png" alt="twitter_logo"></a>
		<a href="https://www.instagram.com/bruh.bank.official/" target="_blank"><img class="logo" src="../logo_icons/instagram_logo.png" alt="ig_logo"></a>
		<a href="https://pl-pl.facebook.com/" target="_blank"><img class="logo" src="../logo_icons/fb_logo.png" alt="fb_logo"></a>
	</footer>
	</body>
	</html>


<?php
	
	function Balancezl()
	{
		require 'Config//db_login_data.php';

		
		$user_ID = $_SESSION['userID'];

		$conn = mysqli_connect($hostname, $user, $passwd, $dbName);
		$sql = "SELECT balance FROM wallet WHERE wallet_ID='$user_ID'";
		$result = $conn->query($sql);
		
		$row = $result->fetch_assoc();
		echo $row['balance']." ZŁ";
	}

	function Balanceusd()
	{
		require 'Config//db_login_data.php';

		
		$user_ID = $_SESSION['userID'];

		$conn = mysqli_connect($hostname, $user, $passwd, $dbName);
		$sql = "SELECT balance FROM wallet WHERE wallet_ID='$user_ID'";
		$result = $conn->query($sql);
		
		$row = $result->fetch_assoc();
		echo number_format($row['balance']/4.11, 2)." $";
	}

	function Balanceeur()
	{
		require 'Config//db_login_data.php';

		
		$user_ID = $_SESSION['userID'];

		$conn = mysqli_connect($hostname, $user, $passwd, $dbName);
		$sql = "SELECT balance FROM wallet WHERE wallet_ID='$user_ID'";
		$result = $conn->query($sql);
		
		$row = $result->fetch_assoc();
		echo number_format($row['balance']/4.66, 2)." €";
	}

	function AccountNumber()
	{
		require 'Config//db_login_data.php';
		session_start();
		$user_ID = $_SESSION['userID'];

		$conn = mysqli_connect($hostname, $user, $passwd, $dbName);
		$sql = "SELECT number FROM wallet WHERE wallet_ID='$user_ID'";
		$result = $conn->query($sql);
		
		$row = $result->fetch_assoc();
		echo $row['number'];
	}

	$now = time(); // Checking the time now when home page starts.

    if ($now > $_SESSION['expire']) 
	{
        session_destroy();
        header("Location: session_expire.php");
    }
?>