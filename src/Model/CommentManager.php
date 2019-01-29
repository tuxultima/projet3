<?php

namespace App\Model;

use \PDO;

class CommentManager extends DbManager
{
	private $db;

	public function __construct()
	{
		$this->db = self::connect();
	}

	public function test()
	{
		$req = $this->db->query('SELECT * FROM comment');
	}
}