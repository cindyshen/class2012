<?php #site_functions.inc.php
	
	define("PAGE_TITLE", "Portfolio of Matthew Campbell");
	
	$page_titles = array(
		"index" => PAGE_TITLE,
		"about" => PAGE_TITLE.": About Me",
		"blog"	=> PAGE_TITLE.": Blog",
		"work" 	=> PAGE_TITLE.": My Work");

	function buildPage($filename, $form_ok_msg = null, $error = null) {
		global $html;
		
		global $replace;
		global $page_titles;
		
		$path = INCLUDE_PATH."html/$filename.inc.html";
		
		$title = $page_titles[$filename];
	
		$replace[0] = file_get_contents($path);
		$replace[1] = $title;
		$replace[2] = buildCSSLink($filename);
		$replace[3] = $filename;
		$replace[4] = $form_ok_msg;
		
		$replace[5] = isset($error["name"]) ? "error" : "hidden";
		$replace[6] = isset($error["email"]) ? "error" : "hidden";
		$replace[7] = isset($error["phone"]) ? "error" : "hidden";
		$replace[8] = isset($error["message"]) ? "error" : "hidden";
		
		$replace[9]  = isset($html["name"]) ? $html["name"] : "";
		$replace[10] = isset($html["email"]) ? $html["email"] : "";
		$replace[11] = isset($html["phone"]) ? $html["phone"] : "";
		$replace[12] = isset($html["message"]) ? $html["message"] : "";
				
	} // End function

	function buildCSSLink($filename) {
		return '<link href="./css/'.$filename.'.css" rel="stylesheet" type="text/css" />';
	} // End buildCSSLink
	
?>