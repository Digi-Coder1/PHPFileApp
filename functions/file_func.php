<?php

/**
bool url_check(string $url): checks a string to see if it contains alphanumeric
characters along with an underscore only. Returns true if the string matches, else returns false.
*/
function url_check($url) {
	return (preg_match('/^[\w]*$/', $url)) ? true : false;
}

/**
string url_replace(string $url): checks a string to see if it contains alphanumeric
characters, an underscore and a forward slash(/) only. Returns the string if it matches, else
search for the character "../", replace it with and empty space, and return it.
*/
function url_replace($url) {
	return (preg_match('/^[\w\/]*$/', $url)) ? $url : str_replace('../', '', $url);
}


?>
