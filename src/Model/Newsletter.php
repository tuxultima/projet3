<?php

namespace App\Model;


class Newsletter
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
  * get newsletter id
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
  * get newsletter email
  * @return string
  */
  public function getEmail(): ?string
  {
  	return $this->email;
  }

  /**
  * set newsletter email
  * @param string $email
  */
  public function setEmail($email): void
  {
  	$this->email = $email;
  }

  /**
  * get newsletter rgpd
  * @return int
  */
  public function getRgpd()
  {
    return $this->rgpd;
  }

  /**
  * set newsletter rgpd
  * @param int $rgpd
  */
  public function setRgpd($rgpd)
  {
    $this->rgpd = $rgpd;
  }
}