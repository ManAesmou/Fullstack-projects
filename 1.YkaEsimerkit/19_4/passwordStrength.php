<?php
/*
	Function to check that password is strong enough 
*/
$password_length = 8;

function password_strength($password) {
	$returnVal = True;

	if ( strlen($password) < $password_length ) {
		$returnVal = False;
	}

	if ( !preg_match("#[0-9]+#", $password) ) {
		$returnVal = False;
	}

	if ( !preg_match("#[a-z]+#", $password) ) {
		$returnVal = False;
	}

	if ( !preg_match("#[A-Z]+#", $password) ) {
		$returnVal = False;
	}

	if ( !preg_match("/[\'^£$%&*()}{@#~?><>,|=_+!-]/", $password) ) {
		$returnVal = False;
	}

	return $returnVal;

}