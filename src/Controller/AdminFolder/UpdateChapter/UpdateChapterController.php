<?php

namespace App\Controller\AdminFolder\UpdateChapter;

use App\Model\ChapterManager;
use App\Model\Chapter;


class UpdateChapterController
{
	public function updatechapter(Chapter $chapterId)
	{
		$updatechaptersure = new ChapterManager();
		$result = $updatechaptersure->updatechapter($chapterId);
		require('src/View/adminfolder/updatechapter/updatechapter.php');
	}
}