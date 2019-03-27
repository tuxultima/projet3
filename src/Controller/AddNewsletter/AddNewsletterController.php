<?php

namespace App\Controller\AddNewsletter;


use App\Model\Newsletter;
use App\Model\NewsletterManager;


class AddNewsletterController
{
	public function addnewsletter($newsletter, $rgpd)
	{
		$news = new Newsletter();
		$news->setEmail($newsletter);
		$news->setRgpd($rgpd);
		$newsletterManager = new NewsletterManager();
		$newsletterManager->addnewsletter($news);
		$_SESSION['flash'] = 'Votre e-mail a bien été inscrit.';
		$flash = $_SESSION['flash'];
		header('Location: newsletters');
	}
}