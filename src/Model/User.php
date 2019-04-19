<?php

namespace App\Model;


class User
{
  /**
  * @var int
  */
	private $id;
  /**
  * @var string
  */
	private $nickname;
  /**
  * @var string
  */
	private $password;
  /**
  * @var string
  */
  private $email;
  /**
  * @var string
  */
  private $password_token;
  /**
  * @var \Datetime
  */
  private $tokenadddate;





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
  * get user id
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
  * get user nickname
  * @return string
  */
 	public function getNickname(): ?string
 	{
 		return $this->nickname;
 	}

  /**
  * set nickname
  * @param string $nickname
  */
 	public function setNickname($nickname): void
 	{
 		$this->nickname = $nickname;
 	}

  /**
  * get user password
  * @return string
  */
 	public function getPassword(): ?string
 	{
 		return $this->password;
 	}

  /**
  * set password
  * @param string $password
  */
 	public function setPassword($password): void
 	{
 		$this->password = $password;
 	}

  /**
  * get user email
  * @return string
  */
  public function getEmail(): ?string
  {
    return $this->email;
  }

  /**
  * set email
  * @param string $email
  */
  public function setEmail($email): void
  {
    $this->email = $email;
  }

  /**
  * get user password_token
  * @return string
  */
  public function getPasswordToken(): ?string
  {
    return $this->password_token;
  }

  /**
  * set token
  * @param string $password_token
  */
  public function setPasswordToken(string $password_token): void
  {
    $this->password_token = $password_token;
  }

  /**
  * get user \Datetime
  * @return \Datetime
  */
  public function getTokenAddDate()
  {
    return $this->tokenadddate;
  }

  /**
  * set user \Datetime
  * @param $tokenadddate
  */
  public function setTokenAddDate($tokenadddate)
  {
    $this->tokenadddate = $tokenadddate;
  }
}