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

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        require 'Config//db_login_data.php';

        $postCode = $_POST['post_code'];
        $city = $_POST['city'];
        $card = $_POST['choose_card'];
        echo $card;

        $conn = mysqli_connect($hostname, $user, $passwd, $dbName);
        $sql1 = "SELECT ID FROM users WHERE name='$name' and second_name='$secondName' and last_name='$surname' and post_code='$postCode' and city='$city'";
        $result1 = $conn->query($sql1);
        if($result1->num_rows == 0)
        {
            echo '<script type="text/javascript">';
			echo 'alert("Wprowadź poprawne dane!")';
			echo '</script>';
			$result->free_result();
        }
        else
        {

        }

    }
    

    echo "</body>
    </html>";

?>