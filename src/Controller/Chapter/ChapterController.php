<?php

namespace App\Controller\Chapter;

use App\Model\ChapterManager;
use App\Model\CommentManager;
use App\Model\Chapter;


class ChapterController 
{
	/**
  	* get one chapter by id
  	*/
	public function thechapter(Chapter $chapter)
	{
		$chapteronly = new ChapterManager();
		$result = $chapteronly->getChapterOnly($chapter);
		if ($result->getTitle() == null) {
			require('src/View/error/error404.php');
		}
		else {
			require('src/View/chapter/chapter.php');	
		}
		
	}
}