<?php

namespace App\Model;


class Contact
{
  /**
  * @var int
  */
	private $id;
  /**
  * @var string
  */
	private $email;
  /**
  * @var string
  */
	private $sujet;
  /**
  * @var string
  */
	private	$message;
  /**
  * @var int
  */
	private $boolnews;
  /**
  * @var int
  */
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

  /**
  * get contact id
  * @return int
  */
  public function getId(): ?int
  {
  	return $this->id;
  }

  public function setId($id): void
  {
  	$this->id = $id;
  }

  /**
  * get contact email
  * @return string
  */
  public function getEmail(): ?string
  {
    return $this->email;
  }

  /**
  * set contact email
  * @param string $email
  */
  public function setEmail($email): void
  {
    $this->email = $email;
  }

  /**
  * get contact sujet
  * @return string
  */
  public function getSujet(): ?string
  {
    return $this->sujet;
  }

  /**
  * set contact sujet
  * @param string $sujet
  */
  public function setSujet($sujet): void
  {
    $this->sujet = $sujet;
  }

  /**
  * get contact message
  * @return string
  */
  public function getMessage(): ?string
  {
    return $this->message;
  }

  /**
  * set contact message
  * @param string $message
  */
  public function setMessage($message): void
  {
    $this->message = $message;
  }

  /**
  * get contact boolnews
  * @return int
  */
  public function getBoolnews()
  {
    return $this->boolnews;
  }

  /**
  * set contact boolnews
  * @param int $boolnews
  */
  public function setBoolnews($boolnews)
  {
    $this->boolnews = $boolnews;
  }

  /**
  * get contact rgpd
  * @return int
  */
  public function getRgpd()
  {
    return $this->rgpd;
  }

  /**
  * set contact rgpd
  * @param int $rgpd
  */
  public function setRgpd($rgpd)
  {
    $this->rgpd = $rgpd;
  }

}