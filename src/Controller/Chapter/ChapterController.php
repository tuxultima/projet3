<?php

namespace App\Controller\Chapter;

use App\Model\ChapterManager;
use App\Model\CommentManager;


class ChapterController 
{
	
	public function thechapter()
	{
		if (isset($_GET['id']) && $_GET['id'] > 0) {
			
		
		$chapterone = new ChapterManager();
		$comment = new CommentManager();
		$chapterone->getChapterOne();
		$comment->comment();
		$results = $chapterone($_GET['id']);
		$results2 = $comment($_GET['id']);
		require('src/View/chapter/chapter.php');
		}
		
		
	}
} 