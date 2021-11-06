<?php
require 'Config//Import_HTML.php';
$fileName = basename($_SERVER['PHP_SELF']);
$fileName = str_replace(".php", "", $fileName);
$filePath = "..//HTML//$fileName.html";

HtmlGenerator::ReadHTML($filePath);


if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(isset($_POST['login'], $_POST['password']))
	{
		
		$login = $_POST['login'];
		$password = $_POST['password'];

		require 'Config//db_login_data.php';

		$conn = mysqli_connect($hostname, $user, $passwd, $dbName);
		$sql = "SELECT user_id FROM accounts_data WHERE login='$login' AND password='$password'";

		$result = $conn->query($sql);
		
		if(mysqli_num_rows($result) == 0)
		{
			echo '<script type="text/javascript">';
			echo 'alert("Wprowadź poprawne dane.")';
			echo '</script>';
		}
		else
		{
			while ($row = $result->fetch_assoc()) 
			{
				session_start();
				$_SESSION['userID'] = $row['user_id'];
				echo $_SESSION['userID'];
				header("location: main.php");
    			exit;

			}
		}
	}
	

}

?>