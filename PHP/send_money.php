<?php

    require 'Config//Import_HTML.php';
    $fileName = basename($_SERVER['PHP_SELF']);
    $fileName = str_replace(".php", "", $fileName);
    $filePath = "..//HTML//$fileName.html";

    HtmlGenerator::ReadHTML($filePath);

    session_start();

    $now = time();

    if ($now > $_SESSION['expire']) 
	{
        session_destroy();
        header("Location: session_expire.php");
    }

    echo "bruh2";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        echo "bruh123";
        if(isset($_POST['first_name'], $_POST['second_name'], $_POST['surname'], $_POST['title'], $_POST['account_number'], $_POST['money']))
	    {
            require 'Config//db_login_data.php';

            $firstName = $_POST['first_name'];
            $secondName = $_POST['second_name'];
            $lastName = $_POST['surname'];
            $title = $_POST['title'];
            $account_number = $_POST['account_number'];
            $money = $_POST['money'];

        if(strlen($account_number) != 26)
        {
            echo '<script type="text/javascript">';
			echo 'alert("Niepoprawny numer konta!")';
			echo '</script>';
        }

            $conn = mysqli_connect($hostname, $user, $passwd, $dbName);
            $sql1 = "SELECT wallet_ID FROM wallet WHERE number='$accountNumber'";
            $result1 = $conn->query($sql1);
            $receiverID = $result1->fetch_assoc()['wallet_ID'];
            $userID = $_SESSION['userID'];
            echo "UserID: ".$userID;
            echo "ReceiverID: ".$receiverID;

            $sql2 = "UPDATE wallet SET balance=balance+$money WHERE wallet_ID='$receiverID' FOR UPDATE";
            $sql3 = "UPDATE wallet SET balance=balance-$money WHERE wallet_ID='$userID' FOR UPDATE";

            $conn->begin_transaction();
            try
            {
                $conn->autocommit(false);
                $conn->query($sql2);
                $conn->query($sql3);
                $conn->commit();
               // header("Location: post_send_money.php");
            }
            catch(Exception $e)
            {
                $conn->rollback();
            }

            
            
        
        }
        else
        {
            echo '<script type="text/javascript">';
			echo 'alert("Wprowadź poprawne dane!")';
			echo '</script>';
        }
    }

    echo "</body>
    </html>";
?>