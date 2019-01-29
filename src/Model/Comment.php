<?php

namespace App\Model;


class Comment
{
	private $id;
	private $nickname;
	private $comment;
	private $dateUpload;

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

  public function getNickname(): ?string
  {
  	return $this->nickname;
  }

  public function setNickname($nickname): void
  {
  	$this->nickname = $nickname;
  }

  public function getComment(): ?string
  {
  	return $this->nickname;
  }

  public function setComment($comment): void
  {
  	$this->comment = $comment;
  }

  public function getDateUpload()
  {
  	return $this->dateUpload;
  }

  public function setDateUpload($dateUpload)
  {
  	$this->dateUpload = $dateUpload;
  }
}