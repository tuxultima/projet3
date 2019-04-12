<?php

namespace App\Controller\About;


class AboutController
{
	/**
  	* render the about page
  	*/
	public function about()
	{
		require('src/View/about/about.php');
	}
}