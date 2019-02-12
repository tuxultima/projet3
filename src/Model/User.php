<?php

namespace App\Model;


class User
{

	private $id;
	private $nickname;
	private $password;




	public function __construct($values = null)
    {
      if ($values != null)
      {
        $this->hydrate($values);
      }
    }


	public function hydrate(array $values)
  	{
   	 foreach ($values as $key => $value)
     {
      $elements = explode("_", $key);
      $newKey = "";
      foreach ($elements as $el) {
      	$newKey .= ucfirst($el);
      }
      $method = "set" . ucfirst($newKey);
      if (method_exists($this, $method)) {
      	$this->$method($value);
      }
     }
     return $this;
 	}

 	public function getId(): ?int
 	{
 		return $this->id;
 	}

 	public function setId($id): void
 	{
 		$this->id = $id;
 	}








}