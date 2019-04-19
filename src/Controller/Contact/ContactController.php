<?php

namespace App\Controller\Contact;

class ContactController
{
	/**
  	* render the contact form page
  	*/
	public function contact()
	{
		require ('src/View/contact/contact.php');
	}
}