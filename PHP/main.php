
<?php session_start(); ?>
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
			GIEŁDA
			<hr class="hr">
			<div id="stock">
			<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/" rel="noopener" target="_blank"><span class="blue-text"></span></a></div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
  {
  "colorTheme": "dark",
  "dateRange": "12M",
  "showChart": true,
  "locale": "en",
  "largeChartUrl": "",
  "isTransparent": true,
  "showSymbolLogo": false,
  "showFloatingTooltip": false,
  "width": "400",
  "height": "500",
  "plotLineColorGrowing": "rgba(101, 101, 101, 1)",
  "plotLineColorFalling": "rgba(101, 101, 101, 1)",
  "gridLineColor": "rgba(240, 243, 250, 0)",
  "scaleFontColor": "rgba(101, 101, 101, 1)",
  "belowLineFillColorGrowing": "rgba(182, 182, 182, 0.12)",
  "belowLineFillColorFalling": "rgba(182, 182, 182, 0.12)",
  "belowLineFillColorGrowingBottom": "rgba(203, 203, 203, 0)",
  "belowLineFillColorFallingBottom": "rgba(41, 98, 255, 0)",
  "symbolActiveColor": "rgba(152, 152, 152, 0.12)",
  "tabs": [
    {
      "title": "Indices",
      "symbols": [
        {
          "s": "BINANCE:BTCUSDT",
          "d": "BITCOIN / TETHERUS"
        },
        {
          "s": "BINANCE:SHIBUSDT",
          "d": "SHIB / TETHERUS"
        },
        {
          "s": "BINANCE:DOGEUSDT",
          "d": "DOGECOIN / TETHERUS"
        },
        {
          "s": "NASDAQ:AAPL",
          "d": "APPLE, INC."
        },
        {
          "s": "NASDAQ:TSLA",
          "d": "TESLA, INC."
        },
        {
          "s": "NASDAQ:AMZN",
          "d": "AMAZON.COM, INC."
        }
      ],
      "originalTitle": "Indices"
    },
    {
      "title": "Futures",
      "symbols": [
        {
          "s": "CME_MINI:ES1!",
          "d": "S&P 500"
        },
        {
          "s": "CME:6E1!",
          "d": "Euro"
        },
        {
          "s": "COMEX:GC1!",
          "d": "Gold"
        },
        {
          "s": "NYMEX:CL1!",
          "d": "Crude Oil"
        },
        {
          "s": "NYMEX:NG1!",
          "d": "Natural Gas"
        },
        {
          "s": "CBOT:ZC1!",
          "d": "Corn"
        }
      ],
      "originalTitle": "Futures"
    },
    {
      "title": "Bonds",
      "symbols": [
        {
          "s": "CME:GE1!",
          "d": "Eurodollar"
        },
        {
          "s": "CBOT:ZB1!",
          "d": "T-Bond"
        },
        {
          "s": "CBOT:UB1!",
          "d": "Ultra T-Bond"
        },
        {
          "s": "EUREX:FGBL1!",
          "d": "Euro Bund"
        },
        {
          "s": "EUREX:FBTP1!",
          "d": "Euro BTP"
        },
        {
          "s": "EUREX:FGBM1!",
          "d": "Euro BOBL"
        }
      ],
      "originalTitle": "Bonds"
    },
    {
      "title": "Forex",
      "symbols": [
        {
          "s": "FX:EURUSD"
        },
        {
          "s": "FX:GBPUSD"
        },
        {
          "s": "FX:USDJPY"
        },
        {
          "s": "FX:USDCHF"
        },
        {
          "s": "FX:AUDUSD"
        },
        {
          "s": "FX:USDCAD"
        }
      ],
      "originalTitle": "Forex"
    }
  ]
}
  </script>
</div>
<!-- TradingView Widget END -->
			</div>
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
      <?php history() ?>
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

    $now = time(); // Checking the time now when home page starts.

    if ($now > $_SESSION['expire']) 
	  {
        session_destroy();
        header("Location: session_expire.php");
    }
	
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
		
		$user_ID = $_SESSION['userID'];

		$conn = mysqli_connect($hostname, $user, $passwd, $dbName);
		$sql = "SELECT number FROM wallet WHERE wallet_ID='$user_ID'";
		$result = $conn->query($sql);
		
		$row = $result->fetch_assoc();
		echo $row['number'];
	}

  function history()
  {
    require 'Config//db_login_data.php';

    $user_ID = $_SESSION['userID'];

    $conn = mysqli_connect($hostname, $user, $passwd, $dbName);
		$sql1 = "SELECT value, transaction_date, pay_in, pay_out FROM history WHERE user_ID='$user_ID' ORDER BY transaction_ID DESC LIMIT 10";
		$result1 = $conn->query($sql1);
    $previousDate = null;
    while($row1 = $result1->fetch_assoc())
    {
      if($row1['transaction_date'] != $previousDate)
      {
        echo $row1['transaction_date']."<br>";
        $previousDate = $row1['transaction_date'];
      }
      
      
      echo $row1['value']."<br>";
    }
  }

	
?>