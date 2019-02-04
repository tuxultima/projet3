<?php

namespace App\Controller\AllChapters;

use App\Model\ChapterManager;

class AllChaptersController
{
	public function allchapters()
	{
		$chapter = new ChapterManager();
		$results = $chapter->getChapters();
		require('src/View/allchapters/allchapters.php');
	}
}