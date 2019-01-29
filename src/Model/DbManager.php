<?php

namespace App\Model;

use \PDO;


class DbManager
{
	protected function connect(){
		try {
			$db = new PDO('mysql:host=localhost;dbname=projet3;charset=utf8','root', '',[PDO::ATTR_ERRMODE => ERRMODE_EXCEPTION])
		}
		catch(\Exception $e)
		{
			die('Erreur : '.$e->getMessage())
		} 
		return $db;
	}


}