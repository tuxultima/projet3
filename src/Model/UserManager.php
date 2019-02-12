<?php

namespace App\Model;

use \PDO;

class UserManager extends DbManager 
{
	
	private $db;

	public function __construct()
	{
		$this->db = self::connect();
	}

	public function getConnection()
	{
		
	}
}