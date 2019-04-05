<?php

namespace App\Controller\About;

use App\Service\Mail;

class AboutController
{
	/**
  	* render the about page
  	*/
	public function about()
	{
		$bruh = new Mail();
		$bruh->sendMail();
		require('src/View/about/about.php');
	}
}