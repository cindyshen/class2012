/*
	Website:		Black and White Portfolio
	File:				main.js
	Author:			Matthew Campbell
	Created On:	2012-03-09
	Revised On:
	Language: 	JavaScript
	
	Purpose:
		Awesome form appearing action (and validation too)
	
	Related Files:
		index.html
		./css/main.css
*/
var fields;

window.onload = init;

var $ = function (id) {
	return document.getElementById(id);
}

var getByType = function (element, attrName, attrValue) {
	var elements = document.getElementsByTagName(element);
	var filtered = new Array();
	
	if (!attrName) {
		return elements;
	} // End if
	else {
	
		for (var i = 0; i < elements.length; i++) {
			if (elements[i].getAttribute(attrName) == attrValue) {
			
				filtered.push(elements[i]);
			} // End inner if
			
		} // End for
		
		return filtered;
		
	} // End else
} // End getByType

function next(elem) {
	do {
			elem = elem.nextSibling;
	} while (elem && elem.nodeType != 1);
	return elem;                
} // End next

function init() {
	$("contact_form").className = "overlay hidden";
	
	$("load_form").onclick = showForm;
} // End init

function showForm() {
	fields = getByType("input", "type", "text");
	fields.push($("message"));
	
	$("contact_form").className = "overlay show";
	
	document.forms[0].onsubmit = validateForm;

	for (var i = 0; i < fields.length; i++) {
		fields[i].onblur = validateField;
		fields[i].valid = false;
		
		if (fields[i].id == "phone") {
			fields[i].valid = true;
		} // End if
	} // End for

} // End showForm

function validateForm() {
	var valid = true;

	for (var i = 0; i < fields.length; i++) {
		if (!fields[i].valid) {
			displayError(fields[i], next(fields[i]));
			valid = false;
		} // End
		else {
			displayValid(fields[i], next(fields[i]));
		} // End else
	} // End for

	return valid;
	
} // End validateForm

function validateField(e) {
	var event = e || window.event;
	var field = event.target || event.srcElement;
	var error = next(field);
	
	switch (field.id) {
		case "name":
		case "message":			
			field.valid = (field.value.length > 0) ? true : false;
			break;
		case "email":
			field.valid = testEmail(field.value, true)
			break;
		case "phone":
			field.valid = testPhone(field.value, false)
			break;
	} // End switch
	
	if (field.valid) {
		displayValid(field, error);		
	} // End if
	else {
		displayError(field, error);			
	} // End else
	
} // End validateField

function displayValid(field, error) {
	field.parentNode.className = "ok_icon";
		
	if (error) {
		error.className = "hidden";
	} // End if
} // End displayValid

function displayError(field, error) {
	field.parentNode.className = "error_icon";

	if (error) {
		error.className = "show";
	} // End if
} // End displayError

function testEmail(email, required) {
	var emailRegEx = 	
		/^[A-Z0-9._%+-]+@(?:[A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
		
	if (!required && email.length == 0) {
		return true;
	} // End if
	else {
		return emailRegEx.test(email);
	} // End else
} // End testEmail

function testPhone(phone, required) {
	var phoneRegEx = /^\(?\d{3}\)?[\s-.]?\d{3}[\s-.]?\d{4}$/;
	
	if (!required && phone.length == 0) {
		return true;
	} // End if
	else {
		return phoneRegEx.test(phone);
	} // End else
} // End testPhone

