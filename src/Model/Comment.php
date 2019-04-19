<?php

namespace App\Model;


class Comment
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
	private $comment;
  /**
  * @var \Datetime
  */
	private $dateUpload;
  /**
  * @var int
  */
  private $chapter_id;
  /**
  * @var int
  */
  private $reported;
  /**
  * @var int
  */
  private $moderate;

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
  * get comment id
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
  * get comment nickname
  * @return string
  */
  public function getNickname(): ?string
  {
  	return $this->nickname;
  }

  /** set nickname
  * @param string $nickname
  */
  public function setNickname($nickname): void
  {
  	$this->nickname = $nickname;
  }

  /**
  * get comment comment
  * @return string
  */
  public function getComment(): ?string
  {
  	return $this->comment;
  }

  /**
  * set comment
  * @param string $comment
  */
  public function setComment($comment): void
  {
  	$this->comment = $comment;
  }

  /**
  * get comment \Datetime
  * @return \Datetime
  */
  public function getDateUpload()
  {
  	return $this->dateUpload;
  }

  /**
  * set comment \Datetime
  * @param $dateUpload
  */
  public function setDateUpload($dateUpload)
  {
  	$this->dateUpload = $dateUpload;
  }

  /**
  * get comment chapter_id
  * @return int
  */
  public function getChapter_Id()
  {
    return $this->chapter_id;
  }

  /**
  * set chapter_id
  * @param int $chapter_id
  */
  public function setChapter_Id($chapter_id)
  {
    $this->chapter_id = $chapter_id;
  }

  /**
  * get comment reported
  * @return int
  */
  public function getReported()
  {
    return $this->reported;
  }

  /**
  * set reported
  * @param int $reported
  */
  public function setReported($reported)
  {
    $this->reported = $reported;
  }

  /**
  * get comment moderate
  * @return int
  */
  public function getModerate()
  {
    return $this->moderate;
  }

  /**
  * set moderate
  * @param int $moderate
  */
  public function setModerate($moderate)
  {
    $this->moderate = $moderate;
  }
}