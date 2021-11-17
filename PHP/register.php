<?php

	require 'Config//Import_HTML.php';
	$fileName = basename($_SERVER['PHP_SELF']);
	$fileName = str_replace(".php", "", $fileName);
	$filePath = "..//HTML//$fileName.html";

	HtmlGenerator::ReadHTML($filePath);

	

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		
		
		if(isset($_POST['email'],$_POST['login'], $_POST['password'],$_POST['confirm_password'],$_POST['radio_account'], $_POST['first_name'], $_POST['second_name'], $_POST['surname'], $_POST['pesel'], $_POST['post_code'], $_POST['city'], $_POST['street']))
		{

			echo 'bruh3 ';
			$email = $_POST['email'];
			$login = $_POST['login'];
			$password = $_POST['password'];
			$confirm_password = $_POST['confirm_password'];
			$account_type = $_POST['radio_account'];
			$firstName = $_POST['first_name'];
			$secondName = $_POST['second_name'];
			$lastName = $_POST['surname'];
			$pesel = $_POST['pesel'];
			$postCode = $_POST['post_code'];
			$city = $_POST['city'];
			$street = $_POST['street'];
			$user_ID = 0;

			require 'Config//db_login_data.php';

			$conn = mysqli_connect($hostname, $user, $passwd, $dbName);

			$sqlv1 = "SELECT id FROM `users` WHERE name='$firstName' AND second_name='$secondName' AND last_name='$lastName' and PESEL='$pesel' AND post_code='$postCode' AND city='$city'";
			$sqlv2 = "SELECT user_ID FROM `accounts_data` WHERE login='$login'";
			$sqlv3 = "SELECT id FROM `users` WHERE mail='$email'";
			$resultv1 = $conn->query($sqlv1);
			$resultv2 = $conn->query($sqlv2);
			echo "<br> resultv1: ".$resultv1->num_rows;
			echo "<br> resultv2: ".$resultv2->num_rows;

			echo "<br> email: $email";

			if($resultv1->num_rows != 0)
			{
				echo '<script type="text/javascript">';
				echo 'alert("Podany użytkownik już istnieje!")';  //not showing an alert box.
				echo '</script>';
			}
			else if($resultv2->num_rows != 0)
			{
				echo '<script type="text/javascript">';
				echo 'alert("Wprowadzony login jest zajęty!")';  //not showing an alert box.
				echo '</script>';
			}
			else
			{
				$sql1 = "INSERT INTO users(name,second_name,last_name,PESEL,post_code,city,mail) VALUES('$firstName', '$secondName', '$lastName', '$pesel', '$postCode', '$city', '$email')";
				$conn->query($sql1);

				$sql = "SELECT id FROM users ORDER BY id DESC LIMIT 1";
				$result = $conn->query($sql);
				while($rec = $result->fetch_assoc())
				{
					$user_ID = $rec['id'];
				}
				
				$sql2 = "INSERT INTO `accounts_data` (`user_ID`, `login`, `password`) VALUES ('$user_ID', '$login', '$password')";
				$conn->query($sql2);
				header("location: post_register.php");
    			exit;
			}


		}

		
	}

	

	echo "</body>
	</html>";
?>