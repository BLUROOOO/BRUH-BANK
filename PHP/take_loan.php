<?php
    
    require 'Config//Import_HTML.php';
    $fileName = basename($_SERVER['PHP_SELF']);
    $fileName = str_replace(".php", "", $fileName);
    $filePath = "..//HTML//$fileName.html";

    HtmlGenerator::ReadHTML($filePath);

    session_start();

    $now = time(); // Checking the time now when home page starts.

    if ($now > $_SESSION['expire']) 
	{
        session_destroy();
        header("Location: session_expire.php");
    }

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $goal = $_POST['goal'];
        $amount = $_POST['amount'];
        $howLong = $_POST['how_long'];
        $yourInstalment = $_POST['your_instalment'];
        $userID = $_SESSION['userID'];
        $debt = 0;

        if(isset($goal,$amount,$howLong,$yourInstalment))
        {
            require 'Config//db_login_data.php';

		    $conn = mysqli_connect($hostname, $user, $passwd, $dbName);
            $sql1 = "SELECT debt FROM wallet WHERE wallet_ID='$userID' FOR UPDATE";
            $sql2 = "UPDATE wallet SET debt='$amount' WHERE wallet_ID='$userID'";
            $sql3 = "UPDATE wallet SET balance=balance+$amount WHERE wallet_ID='$userID'";
            $sql4 = "UPDATE wallet SET Start_dept='$amount' WHERE wallet_ID='$userID'";
            $sql5 = "UPDATE wallet SET Length='$howLong' WHERE wallet_ID='$userID'";
            $sql6 = "UPDATE wallet SET Rate='$yourInstalment' WHERE wallet_ID='$userID'";

            $conn->begin_transaction();
            try
            {
                $conn->autocommit(false);
                $result1 = $conn->query($sql1);
                $debt = $result1->fetch_assoc()['debt'];
                if($debt != 0)
                {
                    echo '<script type="text/javascript">';
			        echo 'alert("Już wziąłeś pożyczkę!")';
			        echo '</script>';
			        $result1->free_result();
                    throw new Exception();
                }

                
                $conn->query($sql2);
                $conn->query($sql3);
                $conn->query($sql4);
                $conn->query($sql5);
                $conn->query($sql6);
                $conn->commit();
                header("Location: post_take_loan.php");
            }
            catch (Exception $e) 
            {
                $conn->rollback();
            }
            



        }
    }

    echo "</body>
    </html>";
?>