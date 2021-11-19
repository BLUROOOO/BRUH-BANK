<?php
require 'Config//Import_HTML.php';
$fileName = basename($_SERVER['PHP_SELF']);
$fileName = str_replace(".php", "", $fileName);
$filePath = "..//HTML//$fileName.html";

HtmlGenerator::ReadHTML($filePath);
$sessionExpire = 15;

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(isset($_POST['login'], $_POST['password']))
	{
		
		$login = $_POST['login'];
		$password = $_POST['password'];
		$dbPassword = "";

		require 'Config//db_login_data.php';

		$conn = mysqli_connect($hostname, $user, $passwd, $dbName);
		$sql = "SELECT user_id FROM accounts_data WHERE login='$login'";
		$sql2 = "SELECT password FROM accounts_data WHERE login='$login'";

		$result = $conn->query($sql);
		$result2 = $conn->query($sql2);
		
		if($result2->num_rows == 0)
		{
			echo '<script type="text/javascript">';
			echo 'alert("Wprowadź poprawny login!")';
			echo '</script>';
			$result->free_result();
		}
		else
		{
			while($row2 = $result2->fetch_assoc())
			{
				$dbPassword = $row2['password'];
				
			}
			if(password_verify($password, $dbPassword))
			{
				while ($row = $result->fetch_assoc()) 
				{
				session_start();
				$_SESSION['userID'] = $row['user_id'];
				$_SESSION['start'] = time();
            
           		$_SESSION['expire'] = $_SESSION['start'] + ($sessionExpire * 60);
				
				$result->free_result();
				header("location: main.php");
    			exit;

				}
			}
			else
			{
				echo '<script type="text/javascript">';
				echo 'alert("Wprowadź poprawne hasło!")';
				echo '</script>';
			}
			
		}
	}
	

}

echo "</body>
</html>";

?>