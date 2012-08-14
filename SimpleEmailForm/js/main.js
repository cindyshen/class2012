/*
	Author:			Matthew Campbell
	Filename:		./js/main.js
	Created On:	2012-03-07
	Revised On:
	Language: 	JavaScript
	
	Purpose:
		Form validation for simple email form
	
	Related Files:
		index.html
*/

window.onload = init;

var $ = function (id) {
	return document.getElementById(id);
}

function init() {
	$("email_form").onsubmit = checkForm;
	$("email_form").onreset = resetForm;
} // End init

function checkForm() {
	var email = $("email").value;
	
	var email_regex = /^\w[-._\w]*\w@\w[-._\w]*\w\.\w{2,8}$/;
	
	if (email_regex.test(email)) {
		return true;
	} // End if
	else {
		$("email_error").className = "error";
		return false;
	} // End else
} // End checkForm

function resetForm() {
	$("email_error").className = "hidden";
} // End resetForm