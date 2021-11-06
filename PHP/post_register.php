<?php

	require 'Config//Import_HTML.php';
	$fileName = basename($_SERVER['PHP_SELF']);
	$fileName = str_replace(".php", "", $fileName);
	$filePath = "..//HTML//$fileName.html";

	HtmlGenerator::ReadHTML($filePath);

	/*if(isset($_POST['email'],$_POST['login'], $_POST['password'], $_POST['first_name'], $_POST['second_name'], $_POST['surname'], $_POST['pesel'], $_POST['post_code'], $_POST['city']))
	{
		$email = $_POST['email'];
		$login = $_POST['login'];
		$password = $_POST['password'];
		$firstName = $_POST['first_name'];
		$secondName = $_POST['second_name'];
		$lastName = $_POST['surname'];
		$pesel = $_POST['pesel'];
		$postCode = $_POST['post_code'];
		$city = $_POST['city'];
		$user_ID = 0;

		include 'db_login_data.php';

		$conn = mysqli_connect($hostname, $user, $passwd, $dbName);

		

		$sql1 = "INSERT INTO users(name,second_name,last_name,PESEL,kod_pocztowy,city) VALUES('$firstName', '$secondName', '$lastName', '$pesel', '$postCode', '$city')";
		$conn->query($sql1);

		$sql = "SELECT id FROM users ORDER BY id DESC LIMIT 1";
		$result = $conn->query($sql);
		while($rec = $result->fetch_assoc())
		{
			$user_ID = $rec['id'];
		}
		
		$sql2 = "INSERT INTO `accounts_data` (`user_ID`, `login`, `password`) VALUES ('$user_ID', '$login', '$password')";
		$conn->query($sql2);

		website();
		
	}*/

?>