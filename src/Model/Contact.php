<?php

namespace App\Model;


class Contact
{
	private $id;
	private $email;
	private $sujet;
	private	$message;
	private $boolnews;
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

  public function getSujet(): ?string
  {
    return $this->sujet;
  }

  public function setSujet($sujet): void
  {
    $this->sujet = $sujet;
  }

  public function getMessage(): ?string
  {
    return $this->message;
  }

  public function setMessage($message): void
  {
    $this->message = $message;
  }

  public function getBoolnews()
  {
    return $this->boolnews;
  }

  public function setBoolnews($boolnews)
  {
    $this->boolnews = $boolnews;
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