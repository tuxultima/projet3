<?php

namespace App\Controller\Chapter;

use App\Model\ChapterManager;
use App\Model\CommentManager;
use App\Model\Chapter;


class ChapterController 
{
	
	public function thechapter(Chapter $chapter)
	{
		
			
		
		$chapterone = new ChapterManager();
		$result = $chapterone->getChapterOne($chapter);
		
		
		require('src/View/chapter/chapter.php');
		
		
		
	}
} 