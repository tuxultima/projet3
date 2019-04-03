<?php

namespace App\Controller\AdminFolder\DeleteNewsletter;

use App\Model\NewsletterManager;
use App\Model\Newsletter;


class DeleteNewsletterController
{
	/**
	* delete newsletter in database
	*/
	public function deleteNewsletter(Newsletter $newsletter)
	{
		$deleteNewsletter = new NewsletterManager();
		$result = $deleteNewsletter->deleteNewsletter($newsletter);
		header('Location:newsletteradmin');
	}
}