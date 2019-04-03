<?php

namespace App\Controller\Newsletters;

class NewslettersController
{
	/**
  	* render the form newsletter page
  	*/
	public function newsletters()
	{
		require('src/View/newsletters/newsletters.php');
	}
}