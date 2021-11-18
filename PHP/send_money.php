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