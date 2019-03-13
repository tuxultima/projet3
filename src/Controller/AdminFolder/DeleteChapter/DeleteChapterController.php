<?php

namespace App\Controller\AdminFolder\DeleteChapter;

use App\Model\ChapterManager;
use App\Model\Chapter;


class DeleteChapterController
{
	public function deleteChapter(Chapter $chapterId)
	{
		$deleteChapter = new ChapterManager();
		$result = $deleteChapter->deleteChapter($chapterId);
		header('Location: chapitresadmin');
	}
}