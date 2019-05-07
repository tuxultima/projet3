<?php

namespace App\Model;

use \PDO;


class DbManagerSample
{	
	/**
  	* connection database
  	*/
	protected function connect(){
		try {
			$db = new PDO('mysql:host=localhost;dbname=yourdbname;charset=utf8','login', 'password',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
			}
		catch(\Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		} 
		return $db;
	}


}