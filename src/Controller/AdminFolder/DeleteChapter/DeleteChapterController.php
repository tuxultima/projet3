<?php

namespace App\Controller\AdminFolder\DeleteChapter;

use App\Model\ChapterManager;
use App\Model\Chapter;


class DeleteChapterController
{
	/**
	* delete chapter in database
	*/
	public function deleteChapter(Chapter $chapterId)
	{
		$deleteChapter = new ChapterManager();
		$result = $deleteChapter->deleteChapter($chapterId);
		header('Location: chapitresadmin');
	}
}