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
		$user = new User($result);
		return $user;
	}

	public function getConnect()
	{
		if (isset($_SESSION['Admin']) && isset($_SESSION['Admin']['nickname']) && isset($_SESSION['Admin']['password'])) {
			extract($_SESSION['Admin']);
			$req = $this->db->prepare('SELECT id, nickname, password FROM user WHERE nickname = $nickname AND password = $password');
			$sql = mysql_query($req) or die(mysql_error());
			if (mysql_num_rows($sql)>0) {
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
		
	}

	public function getConnected()
	{
		$req = $this->db->prepare('SELECT id, nickname, password FROM user ');
		$req->execute();
		$result = $req->fetch(PDO::FETCH_ASSOC);
		$user = new User($result);
		return $user;
	}
}