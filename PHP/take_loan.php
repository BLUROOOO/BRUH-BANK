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

        if(isset($goal,$amount,$howLong,$yourInstalment))
        {
            
        }
    }
?>