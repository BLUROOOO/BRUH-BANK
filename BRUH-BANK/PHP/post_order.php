<?php

    require 'Config//Import_HTML.php';
    $fileName = basename($_SERVER['PHP_SELF']);
    $fileName = str_replace(".php", "", $fileName);
    $filePath = "..//HTML//$fileName.html";

    HtmlGenerator::ReadHTML($filePath);
    session_start();

    if(isset($_POST['first_name'], $_POST['second_name'], $_POST['surname'], $_POST['post_code'], $_POST['city'], $_POST['street'], $_POST['choose_card']))
    {
        $firstName = $_POST['first_name'];
        $secondName = $_POST['second_name'];
        $surname = $_POST['surname'];
        $postCode = $_POST['post_code'];
        $city = $_POST['city'];
        $street = $_POST['street'];
        $chooseCard = $_POST['choose_card'];

        require 'Config//db_login_data.php';

		$conn = mysqli_connect($hostname, $user, $passwd, $dbName);
    }
    echo "</body>
    </html>";

?>