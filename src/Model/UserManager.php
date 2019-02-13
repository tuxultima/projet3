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
		$req = $this->db->prepare('SELECT id, nickname, password FROM user');
		$result = $req->fetchAll(PDO::FETCH_ASSOC);
		$user = [];
		foreach ($result as $data) 
		{
			$objUser = new User($data);
			$user[] = $objUser; 
		}
		return $user;
	}
}