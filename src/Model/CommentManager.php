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

	public function comment($postId)
	{
		$req = $this->db->query('SELECT id, nickname, comment, dateUpload, chapter_id, reported, moderate FROM comment WHERE chapter_id = ? ORDER BY dateUpload');
		$data = $req->fetchAll(PDO::FETCH_ASSOC);
		$req->execute(array($postId));
		$comment = [];
		$objChapter = new Comment($data);
		$comment[] = $objComment;
		return $comment;
	}
}