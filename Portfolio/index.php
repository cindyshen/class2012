<?php # index.php

	define("INCLUDE_PATH", "Includes/");

	include_once(INCLUDE_PATH."validation.inc.php");
	include_once(INCLUDE_PATH."site_functions.inc.php");
	
	$find = array("PHP_MAIN", 
								"PHP_TITLE", 
								"PHP_CSS_LINK", 
								"PHP_FORM_HIDDEN",
								"PHP_FORM_OK",
								"PHP_ERR_NAME",
								"PHP_ERR_EMAIL",
								"PHP_ERR_PHONE",
								"PHP_ERR_MESSAGE",
								"PHP_DATA_NAME",
								"PHP_DATA_EMAIL",
								"PHP_DATA_PHONE",
								"PHP_DATA_MESSAGE");
								
	$replace = array();
	
	$clean = array();
	$mysql = array();
	$html = array();
	
	$page = file_get_contents(INCLUDE_PATH."html/template.inc.html");
	
	$insertSuccess = false;
	$msg = "";
	
	if (isset($_GET['p'])) {	
		switch($_GET['p']) {
			case 'a':
				buildPage("about");
				break;
			case 'w':
			case 'b':
			case 's':
				$result = validateForm();
				if ($result === false) {
					// Something horrible happened
					header("Location: ./");
				} 
				else if (is_array($result) && !empty($result)) {
					// If form data is unclean
					sanitizeHTML();
					buildPage($clean["page"], null, $result);
				} 
				else {
					// If form data is clean
					include_once(INCLUDE_PATH."model/model.inc.php");
					
					sanitizeDatabase();
					$insertSuccess = insertMessage();
					
					$msg = $insertSuccess ? "Thank you for contacting me." :
																	"An error has occurred, please try again.";
					
					buildPage($clean["page"], $msg);
				} 
				break;
			default:
				buildPage("index");
				break;
		} // End switch
	} // End if
	else {
		buildPage("index");
	} // End else
	
	$page = str_replace($find, $replace, $page);
	
	echo $page;
	
	function validateForm() {
		global $clean;
		$error = array();
		
		$values = array(
			"name" 		=> null, 
			"email" 	=> null, 
			"phone" 	=> null, 
			"message" => null,
			"page" 		=> null);
		
		$values = array_merge($values, $_POST);
		
		if (in_array(null, $values, true)) {
			return false;
		} // End if	
		else {
			if (testRequired($values["name"])) {
				$clean["name"] = trim($values["name"]);
			} // End if
			else {
				$error["name"] = "Error";
			} // End else

			if (testEmail($values["email"])) {
				$clean["email"] = $values["email"];
			} // End if
			else {
				$error["email"] = "Error";
			} // End else
			
			if (testPhone($values["phone"], true)) {
				$clean["phone"] = $values["phone"];
			} // End if
			else {
				$error["phone"] = "Error";
			} // End else
			
			if (testRequired($values["message"])) {
				$clean["message"] = trim($values["message"]);
			} // End if
			else {
				$error["message"] = "Error";
			} // End else
			
			switch($values["page"]) {
				case "index":
				case "about":
				case "work":
				case "blog":
					$clean["page"] = $values["page"];
					break;
				default:
					return false;
					break;
			} // End switch
			
			return $error;
		} // End else
	} // End validateForm

	function sanitizeHTML() {
		global $clean;
		global $html;
		
		foreach ($clean as $key => $value) {
			$html[$key] = htmlentities($value, ENT_QUOTES, 'UTF-8');
		} 
		
	} // End sanitizeHTML
?>