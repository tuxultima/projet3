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

	public function getChapterOne($postId)
	{
		$req = $this->db->query('SELECT *, * FROM chapter c INNER JOIN comment co ON c.id = co.chapted_id WHERE c.id,co.chapter_id = ?');
		$data = $req->fetchAll(PDO::FETCH_ASSOC);
		$req->execute(array($postId));
		$chapterOne = [];
		$objChapter = new Chapter($data);
		$chapterOne[] = $objChapter;
		return $chapterOne;
	}

	public function getChapterOnly($postId)
	{
		$req = $this->db->query('SELECT id, title, content, dateUpload FROM chapter where id = ?');
		$data = $req->fetchAll(PDO::FETCH_ASSOC);
		$req->execute(array($postId));
		$chapterOnly = [];
		$objChapter = new Chapter($data);
		$chapterOnly[] = $objChapter;
		return $chapterOnly;
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