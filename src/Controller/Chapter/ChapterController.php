<?php

namespace App\Controller\Chapter;

use App\Model\ChapterManager;
use App\Model\CommentManager;
use App\Model\Chapter;


class ChapterController 
{
	public function thechapter(Chapter $chapter)
	{
		$chapteronly = new ChapterManager();
		$result = $chapteronly->getChapterOnly($chapter);
		require('src/View/chapter/chapter.php');	
	}
}