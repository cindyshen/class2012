<?php

function addCookie($sUser){
	setcookie('username', $sUser);
	$_COOKIE['username']= $sUser;
}

function addUser($aPost){
	
	$sError = "Success";
	$oUser = User::find_by_username($aPost['username']);
	
	if($oUser)
	{
		$sError = "The Username is already taken";		
	}
	else if($aPost['password'] != $aPost['repeatpassword'])
	{
		$sError = "The Password doesn't match";
	}
	else
	{
		$oUser = new User;
		$oUser->password = sha1($aPost['username'] . $aPost['password']);
		$oUser->username = $aPost['username'];
		$oUser->save();
	}
	
	return $sError;
	
}

function validateUser($aPost){
	$oUser = User::find_by_username($aPost['username']);

	if( $oUser && sha1($aPost['username'] . $aPost['password'] )== $oUser->password){
		return true;
	}
	return false;
}

?>