<?php

namespace App\Model;


class Chapter
{
  /**
  * @var int
  */
	private $id;
  /**
  * @var string
  */
	private $title;
  /**
  * @var string
  */
	private $content;
  /**
  * @var \Datetime
  */
	private	$dateUpload;
  /**
  * @var array
  */
	private $comments = [];



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
* get chapter id
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
* get chapter title
* @return string
*/
public function getTitle(): ?string
{
	return $this->title;
}

/**
* set title
* @param string $title
*/
public function setTitle($title): void
{
	$this->title = $title;
}

/**
* get chapter content
* @return string
*/
public function getContent(): ?string
{
	return $this->content;
}

/**
  * set content
  * @param string $content
  */
public function setContent($content): void
{
	$this->content = $content;
}

/**
* get chapter \Datetime
* @return \Datetime
*/
public function getDateUpload()
{
	return $this->dateUpload;
}

/**
  * set chapter \Datetime
  * @param $dateUpload
  */
public function setDateUpload($dateUpload)
{
	$this->dateUpload = $dateUpload;
}

/**
* get chapter comments
* @return array
*/
public function getComments(): array
{
	return $this->comments;
}

  /**
  * set comments
  * @param $comments[]
  */
public function setComments($comments)
{
	$this->comments = $comments;
}

}