<?php

namespace App\Controller\Notice;

class NoticeController
{
	/**
  	* render the notice page
  	*/
	public function notice()
	{
		require('src/View/notice/notice.php');
	}
}