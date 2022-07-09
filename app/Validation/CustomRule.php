<?php
namespace App\Validation;

class CustomRule
{
	
	function check_date(string $str, string &$error = null): bool
	{
		if($str < date("Y-m-d"))
		{
			return false;
		}
		return true;
	}
}