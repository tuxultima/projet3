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

	public function getConnection($nickname)
	{
		$req = $this->db->prepare('SELECT id, nickname, password FROM user WHERE nickname = ?');
		$req->execute([$nickname]);
		$result = $req->fetch(PDO::FETCH_ASSOC);
		$user = [];
		foreach ($result as $data) 
		{
			$objUser = new User($data);
			$user[] = $objUser; 
		}
		var_dump($user);die;
		return $user;
	}
}