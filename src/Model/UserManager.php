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

	// fonction pour que l'utilisateur se connecte
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

	// fonction pour vérifier que l'utilisateur est bien connecter
	public function getConnected()
	{
		$req = $this->db->prepare('SELECT id, nickname, password FROM user ');
		$req->execute();
		$result = $req->fetch(PDO::FETCH_ASSOC);
		$user = new User($result);
		return $user;
	}
}