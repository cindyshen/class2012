<?php
	DEFINE("INCLUDE_PATH", "./Includes/");

	$page = null;
	
	$clean = Array();
	$mysql = Array();
	$html = Array();
	$error = Array();
	
	$values = Array(
		'name' 			=> null,
		'email' 		=> null,
		'question' 	=> null);
		
	$find = ARRAY('PHP_NAME_ERR_LABEL','PHP_EMAIL_ERR_LABEL','PHP_QUESTION_ERR_LABEL',		'PHP_NAME_VALUE', 'PHP_EMAIL_VALUE', 'PHP_QUESTION_VALUE', 'PHP_FORM_MSG');
	
	$replace = ARRAY();
	
	if (isset($_GET['p'])) {
		switch ($_GET['p']) {
			case 's':
				$result = cleanForm();
				
				if ($result === false) {
					header("Location: /");
				}
				else if (is_array($result) && !empty($result)) {
					sanitizeHTML();
					$page = buildPage($result);
				}
				else {
					include_once(INCLUDE_PATH."model/model.inc.php");
					sanitizeDatabase();
					$result = insertQuestion();
					
					$formMsg = ($result) ? "Thank you." : "Error Will Robinson!";
					
					$page = buildPage(null, $formMsg);
				}
				
				break;
			default:
				$page = buildPage();
				break;
		}
	}
	else {
		$page = buildPage();
	}

	echo $page;
	
	function buildPage($errors = null, $formMsg = null) {
		global $find;
		global $replace;
		global $html;
		
		$replace[0] = isset($errors['name']) ? 'error_label' : 'hidden';
		$replace[1] = isset($errors['email']) ? 'error_label' : 'hidden';
		$replace[2] = isset($errors['question']) ? 'error_label' : 'hidden';
		
		$replace[3] = isset($html['name']) ? $html['name'] : '';
		$replace[4] = isset($html['email']) ? $html['email'] : '';
		$replace[5] = isset($html['question']) ? $html['question'] : '';
		
		$replace[6] = isset($formMsg) ? $formMsg : '';
		
		$page = file_get_contents(INCLUDE_PATH."html/index.inc.html");
			
		$page = str_replace($find, $replace, $page);
		
		return $page;
	}
	
	function cleanForm() {
		
		include_once(INCLUDE_PATH."validation.inc.php");
	
		global $values;
		global $clean;
		global $error;
		
		$values = array_merge($values, $_POST);
		
		if (in_array(null, $values, true)) {
			return false;
		}
		
		if (testRequired($values['name'])) {
			$clean['name'] = trim($values['name']);
		}
		else {
			$error['name'] = 'error';
		}
		
		if (testEmail($values['email'])) {
			$clean['email'] = $values['email'];
		}
		else {
			$error['email'] = 'error';
		}
		
		if (testRequired($values['question'])) {
			$clean['question'] = trim($values['question']);
		}
		else {
			$error['question'] = 'error';
		}
		
		return $error;	
	} // End cleanForm

	function sanitizeHTML() {
		global $clean;
		global $html;
		
		foreach ($clean as $key => $value) {
			$html[$key] = htmlentities($value, ENT_QUOTES, 'UTF-8');
		} 
		
	} // End sanitizeHTML
?>