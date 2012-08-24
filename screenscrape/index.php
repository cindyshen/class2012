<?php
	// 
	header("Content-Type: text/plain"); 	
	// get the weather rss feed 
	//$sIn = file_get_contents("http://www.rssweather.com/wx/ca/on/waterloo/rss.php");
	// get twitter feed
	$sIn = file_get_contents("http://search.twitter.com/search.atom?q=MelakneeG&rpp=5&lang=en");
	// get fliker
	//$sIn = file_get_contents("http://api.flickr.com/services/feeds/photos_public.gne?id=51035594111@N01");
	
	echo $sIn;
	exit();
	/*--
 	preg_match_all("|<title(.*)</title>|U", $sIn, $aIn);
 
 	//print_r($aIn);
	 
 	foreach ( $aIn[0] as $aTitle)
 	{
 		echo $aTitle . "\n";
 	}
 	-->	

?>