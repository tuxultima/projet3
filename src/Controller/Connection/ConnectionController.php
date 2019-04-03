<?php

namespace App\Controller\Connection;

class ConnectionController
{
	/**
  	* render the form connection page
  	*/
	public function connection()
	{
		require('src/View/connection/connection.php');
	}
}