<?php

namespace App\Controller\Error;


class Error404Controller
{
	public function error404() {
		require('src/View/error/error404.php');
	}
}
	