<?php

namespace App\Model;

use \PDO;

class ChapterManager extends DbManager
{
	private $db;

	public function __construct()
	{
		$this->db = self::connect();
	}

	public function test()
	{
		$req = $this->db->query('SELECT id, title, content, dateUpload FROM chapter ORDER BY dateUpload');
		$data = $req->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function getChapters()
	{
		$req = $this->db->query('SELECT id, title, content, dateUpload FROM chapter ORDER BY dateUpload');
		$results = $req->fetchAll(PDO::FETCH_ASSOC);
		$chapters = [];
		foreach ($results as $data) 
		{
			$objChapter = new Chapter($data);
			$chapters[] = $objChapter; 
		}
		return $chapters;
	}


}