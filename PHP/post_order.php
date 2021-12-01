<?php
    error_reporting(0);
    require 'Config//Import_HTML.php';
    $fileName = basename($_SERVER['PHP_SELF']);
    $fileName = str_replace(".php", "", $fileName);
    $filePath = "..//HTML//$fileName.html";

    HtmlGenerator::ReadHTML($filePath);
    session_start();

    require 'Config//db_login_data.php';

    $cardNumber = str_pad(rand(0, pow(10, 16)-1), 16, '0', STR_PAD_LEFT);
    $funny3 = str_pad(rand(0, pow(10, 3)-1), 3, '0', STR_PAD_LEFT);
    $userID = $_SESSION['userID'];

    $conn = mysqli_connect($hostname, $user, $passwd, $dbName);
    $sql1 = "UPDATE wallet SET credit_card='$cardNumber' WHERE wallet_ID='$userID';";
    $sql2 = "UPDATE wallet SET funny3='$funny3' WHERE wallet_ID='$userID';";
    $conn->query($sql1);
    $conn->query($sql2);

    echo "</body>
    </html>";

?>