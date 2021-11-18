<?php
	
	require 'Config//Import_HTML.php';
	$fileName = basename($_SERVER['PHP_SELF']);
	$fileName = str_replace(".php", "", $fileName);
	$filePath = "..//HTML//$fileName.html";

	HtmlGenerator::ReadHTML($filePath);

	session_start();

	
	session_unset();
	session_destroy();

?>