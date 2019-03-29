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

public function getContent(): ?string
{
	return $this->content;
}

public function setContent($content): void
{
	$this->content = $content;
}

public function getDateUpload()
{
	return $this->dateUpload;
}

public function setDateUpload($dateUpload)
{
	$this->dateUpload = $dateUpload;
}

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