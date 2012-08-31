 <?php
 
 //***********************************
 // connect to database
 //***********************************
 
 require '../ActiveRecord/ActiveRecord.php';
 
 ActiveRecord\Config::initialize(function($cfg)
 {
 	$cfg->set_model_directory('model');
 	$cfg->set_connections(
 			array(
 					'development' => 'mysql://root:@localhost/jobs',
 					'test' => 'mysql://username:password@localhost/test_database_name',
 					'production' => 'mysql://username:password@localhost/production_database_name'
 			)
 	);
 });
 
 //***********************************
 // scrape the rss feed of jobs
 //***********************************
 
  
 header("Content-Type: text/plain");
 $sIn = file_get_contents("http://www.wowjobs.ca/wowrss.aspx?q=Web+Developer&l=N2T1G8&s=&sr=25&t=30&f=r&e=&si=A&Dup=H");
 if(preg_match_all("|<item(.*)</item>|U", $sIn, $aItem)){ 	
 	 	
 	foreach($aItem[0] as $sItem)
 	{
 	 	 $oJob = new Job;
 	 	 
 	 	 if(preg_match_all("|<guid(.*)</guid>|U", $sItem, $aGuid)){
  	 	 	//echo $aGuid[0][0]  . "\n";
 			$sGuid =  preg_replace ('/<[^>]*>/', '', $aGuid[0][0]); 			
 			//echo $sGuid  . "\n";
 			$oJob->guid = $sGuid;
 		}
 		if(preg_match_all("|<title(.*)</title>|U", $sItem, $aTitle)){
 			$sTitle = preg_replace('/<!\[CDATA\[/', '', $aTitle[0][0]);
 			$sTitle = preg_replace('/\]\]>/', '', $sTitle);
 			$sTitle =  preg_replace ('/<[^>]*>/', '', $sTitle);
 			//echo strip_tags($sTitle) . "\n";
 			$oJob->title = $sTitle;
 		}
 	 	if(preg_match_all("|<description(.*)</description>|U", $sItem, $aDescription)){ 	 		
 			//echo $aDescription[0][0]  . "\n";
 	 		$sDescription =  preg_replace ('/<[^>]*>/', '', $aDescription[0][0]); 	 		
 	 		//echo $sDescription  . "\n";
 	 		$oJob->description = $sDescription;
 		}
 	 	if(preg_match_all("|<link(.*)</link>|U", $sItem, $aLink)){
 			//echo $aLink[0][0]  . "\n";
 	 		$sLink =  preg_replace ('/<[^>]*>/', '', $aLink[0][0]);
 	 		//echo $sLink  . "\n";
 	 		$oJob->link = $sLink;
 		}
 	 	if(preg_match_all("|<pubDate(.*)</pubDate>|U", $sItem, $aDate)){
 			//echo $aDate[0][0]  . "\n";
 	 		$sDate =  preg_replace ('/<[^>]*>/', '', $aDate[0][0]);
 	 		//echo $sDate  . "\n";
 	 		$oJob->pubdate = $sDate;
 		}
 	 	if(preg_match_all("|<author(.*)</author>|U", $sItem, $aAuthor)){
 			//echo $aAuthor[0][0]  . "\n";
 	 		$sAuthor  =  preg_replace ('/<[^>]*>/', '', $aAuthor[0][0]);
 	 		//echo $sAuthor . "\n";
 	 		$oJob->author = $sAuthor;
 		}
 		
 		$oJob->save();
 	}
 	
 }else{
 	echo "nothing to display";
 }


	include 'views/list_jobs.php';
?>