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

	public function getChapterOnly(Chapter $chapter)
	{
		$req = $this->db->prepare('SELECT c.id, c.title, c.content, c.dateUpload, co.id AS com_id, co.nickname, co.comment, co.dateUpload AS com_date, co.chapter_id, co.reported, co.moderate FROM chapter c LEFT JOIN comment co ON co.chapter_id = c.id WHERE c.id = ?');
		$req->execute(array($chapter->getId()));
		$data = $req->fetchAll(PDO::FETCH_ASSOC);
		$comments = [];
		foreach ($data as $value) {
			$chapter->setTitle($value['title']);
			$chapter->setContent($value['content']);
			$chapter->setDateUpload($value['dateUpload']);
			if ($value['com_id']) {
				$comment = new Comment();
				$comment->setId($value['com_id']);
				$comment->setNickname($value['nickname']);
				$comment->setComment($value['comment']);
				$comment->setDateUpload($value['com_date']);
				$comment->setReported($value['reported']);
				$comment->setModerate($value['moderate']);
				$comments[] = $comment;
			}

		}
		$chapter->setComments($comments);
		return $chapter;
	}

	public function getChapterNan($postId)
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