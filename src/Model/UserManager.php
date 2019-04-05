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

	/**
  	* connection admin account
  	*/
	public function getConnection(User $user)
	{
		$req = $this->db->prepare('SELECT id, nickname, password FROM user WHERE nickname = ?');
		$req->execute([$user->getNickname()]);
		$result = $req->fetch(PDO::FETCH_ASSOC);
		return $result;
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

	/**
  	* check connection admin account
  	*/
	public function getConnected()
	{
		$req = $this->db->prepare('SELECT id, nickname, password FROM user ');
		$req->execute();
		$result = $req->fetch(PDO::FETCH_ASSOC);
		$user = new User($result);
		return $user;
	}

	public function updatingPassword(User $user)
	{
		$req = $this->db->prepare('UPDATE user SET password = :password WHERE id = :id');
		$upp = $req->execute(array(
			'password'=>$user->getpassword(),
		));
		return $upp;
	}
}