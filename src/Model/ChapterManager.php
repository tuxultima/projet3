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

	/**
	* get one chapter by id with and his comments
	* @return Chapter
	*/
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

	/**
	* get all chapters order by dateUpload
	* @return Chapter
	*/
	public function getChapters()
	{
		$req = $this->db->query('SELECT id, title, content, DATE_FORMAT(dateUpload, "%d/%m/%Y") AS dateUpload FROM chapter ORDER BY dateUpload');
		$results = $req->fetchAll(PDO::FETCH_ASSOC);
		$chapters = [];
		foreach ($results as $data) 
		{
			$objChapter = new Chapter($data);
			$chapters[] = $objChapter; 
		}
		return $chapters;
	}

	/**
	* add one chapter
	* @return Add
	*/
	public function addchapter(Chapter $chapter)
	{
		$req = $this->db->prepare('INSERT INTO chapter (title, content, dateUpload) VALUES(:title, :content, NOW())');
		$add = $req->execute(array(
			'title'=>$chapter->getTitle(),
			'content'=>$chapter->getContent()
		));
		return $add;
	}

	/**
	* take content of one chapter get by id
	* @return ChapterId
	*/
	public function updatechapter(Chapter $chapterId)
	{
		$req = $this->db->prepare('SELECT id, title, content, dateUpload FROM chapter where id = ?');
		$req->execute(array($chapterId->getId()));
		$data = $req->fetchAll(PDO::FETCH_ASSOC);
		foreach ($data as $value) {
			$chapterId->setTitle($value['title']);
			$chapterId->setContent($value['content']);
			$chapterId->setDateUpload($value['dateUpload']);
		}
		return $chapterId;
	}

	/**
	* update one chapter get by id
	* @return upp
	*/
	public function updatingchapter(Chapter $chapterId)
	{
		$req = $this->db->prepare('UPDATE chapter SET title = :title, content = :content WHERE id = :id');
		$upp = $req->execute(array(
			'id'=>$chapterId->getId(),
			'title'=>$chapterId->getTitle(),
			'content'=>$chapterId->getContent()
		));
		return $upp;
	}

	/**
	* delete one chapter get by id
	* @return delete
	*/
	public function deleteChapter(Chapter $chapter)
	{
		$req = $this->db->prepare('DELETE FROM chapter WHERE id = :id');
		$delete = $req->execute(['id'=>$chapter->getId()]);
		return $delete;
	}
}