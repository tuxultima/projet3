<?php

namespace App\Controller\Newsletters;

class NewslettersController
{
	public function newsletters()
	{
		require('src/View/newsletters/newsletters.php');
	}
}