<?php
    error_reporting(0);
    session_start();
    
    $now = time();
    if ($now > $_SESSION['expire']) 
	{
        session_destroy();
        header("Location: session_expire.php");
    }

    $userID = $_SESSION['userID'];
    require 'Config//db_login_data.php';
	$conn = mysqli_connect($hostname, $user, $passwd, $dbName);
    $sql1 = "SELECT debt FROM wallet WHERE wallet_ID='$userID' FOR UPDATE";
    $conn->begin_transaction();
    try
    {
        $conn->autocommit(false);
        $result1 = $conn->query($sql1);
        $debt = $result1->fetch_assoc()['debt'];
        if($debt == 0)
        {
            
			$result1->free_result();
            throw new Exception();
        }
    }
    catch(Exception $e)
    {
        $conn->rollback();
        header("Location: no_debt.php");
    }
 
            $sql2 = "SELECT Start_dept FROM wallet WHERE wallet_ID='$userID' FOR UPDATE";
            $sql3 = "SELECT instalment FROM wallet WHERE wallet_ID='$userID' FOR UPDATE";
            $sql4 = "SELECT debt_date FROM wallet WHERE wallet_ID='$userID' FOR UPDATE";
            $sql5 = "SELECT length FROM wallet WHERE wallet_ID='$userID' FOR UPDATE";

            $conn->begin_transaction();
            try
            {
                $conn->autocommit(false);
                $startDebt = $conn->query($sql2)->fetch_assoc()['start_dept'];
                $instalment = $conn->query($sql3)->fetch_assoc()['instalment'];
                $debt_date = new DateTime($conn->query($sql4)->fetch_assoc()['debt_date']);
                $currentDate = new DateTime('now');
                $length = $conn->query($sql5)->fetch_assoc()['length'];
                $debt_date->modify("+$length month");
                //$debt_date = $debt_date->format('Y-m-d');
                //echo $debt_date."<br>";
                //echo $currentDate->format('Y-m-d');
                
               
                $GLOBALS['expire'] = $currentDate->diff($debt_date)->y*12+$currentDate->diff($debt_date)->m;
                

                $conn->commit();

            }
            catch (Exception $e) 
            {
                $conn->rollback();
            }
    


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BRUH. BANK S.A. | SPŁAĆ RATĘ</title>
	<link rel="stylesheet" type="text/css" href="../styles/style.css">
	<link rel="icon" href="../logo_icons/bank_logo.png">
</head>
<body>
	<form method="POST" action="">
	<header>
        <a href="../PHP/main.php">BRUH. BANK S.A. | SPŁAĆ RATĘ</a>
		<input type="submit" value="SPŁAĆ">
	</header>
	<article id="article6">
		<div id="send_money">
			SPŁAĆ RATĘ
			<hr class="hr">
				<label for="money">KWOTA POŻYCZKI: </label><br>
				<input type="text" name="money" value="<?php echo $startDebt ?>" readonly><br>

				<label for="left">POZOSTAŁO DO SPŁATY: </label><br>
				<input type="text" name="left" value="<?php echo $debt ?>" readonly>

                <label for="instalment">POZOSTAŁO MIESIĘCY: </label><br>
				<input type="text" name="instalment" value="<?php echo $GLOBALS['expire']; ?>" readonly><br>

				<label for="pay_instalment">WIELKOŚĆ RATY: </label><br>
				<input type="number" name="pay_instalment" value="<?php echo $instalment ?>" readonly>
		</div>
	</form>
	</article>
	<div id="news">
	<marquee scrolldelay="70">
		Nowość! Pożyczka Stabilna (RRSO 0,00%) | Decydujesz. Zlecasz. Kontrolujesz. Nieograniczony dostęp do konta w BRUH. BANK | Nawet do 150 zł premii dla studentów od BRUH. BANK | Dodatkowe pieniądze na Twoim koncie. Nie korzystasz? Nie płacisz!
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

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $sql4 = "UPDATE wallet SET balance=balance-$instalment WHERE wallet_ID='$userID'";
        $sql5 = "UPDATE wallet SET debt=debt-$instalment WHERE wallet_ID='$userID'";
        $conn->begin_transaction();
        $conn->autocommit(false);
        try
        {
            $conn->query($sql4);
            $conn->query($sql5);
            $conn->commit();
            header("Location: post_pay_instalment.php");
        }
        catch(Exception $e)
        {
            $conn->rollback();
        }

    }

?>

