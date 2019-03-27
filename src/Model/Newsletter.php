<?php

namespace App\Model;


class Newsletter
{
	private $id;
	private $email;
  private $rgpd;




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

  public function getEmail(): ?string
  {
  	return $this->email;
  }

  public function setEmail($email): void
  {
  	$this->email = $email;
  }

  public function getRgpd()
  {
    return $this->rgpd;
  }

  public function setRgpd($rgpd)
  {
    $this->rgpd = $rgpd;
  }
}