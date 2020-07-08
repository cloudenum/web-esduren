<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('abbreviate')) {
	/**
	 * Returns abbreviated string from the given string
	 * 
	 * Take the first letter on each word after any space
	 * 
	 * @param string $string
	 * @return string
	 */
	function abbreviate(string $string) {
		$abbreviation = "";
		$string = ucwords($string);
		$words = explode(" ", "$string");
		foreach ($words as $word) {
			$abbreviation .= $word[0];
		}
		return $abbreviation;
	}
}
