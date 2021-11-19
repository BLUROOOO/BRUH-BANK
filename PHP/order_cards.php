<?php
    session_start();

    $now = time();

    if ($now > $_SESSION['expire']) 
	{
        session_destroy();
        header("Location: session_expire.php");
    }

    
    require 'Config//Import_HTML.php';
    $fileName = basename($_SERVER['PHP_SELF']);
    $fileName = str_replace(".php", "", $fileName);
    $filePath = "..//HTML//$fileName.html";

    HtmlGenerator::ReadHTML($filePath);

    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        require 'Config//db_login_data.php';

        $cardNumber = $account_number = str_pad(rand(0, pow(10, 16)-1), 16, '0', STR_PAD_LEFT);

        $conn = mysqli_connect($hostname, $user, $passwd, $dbName);
        $sql1 = "UPDATE wallet SET credit_card='$cardNumber'";
        $result1 = $conn->query($sql1);
        

    }
    

    echo "</body>
    </html>";

?>