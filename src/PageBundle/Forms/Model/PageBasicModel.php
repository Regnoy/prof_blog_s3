<?php


namespace PageBundle\Forms\Model;

use Symfony\Component\Validator\Constraints as Assert;

class PageBasicModel {

  /**
   * @Assert\NotBlank(
   *   message = 'Title is required'
   * )
   */
  private $title;
  /**
   * @Assert\NotBlank()
   */
  private $body;

  /**
   * @return mixed
   */
  public function getTitle() {
    return $this->title;
  }

  /**
   * @param mixed $title
   */
  public function setTitle($title) {
    $this->title = $title;
  }

  /**
   * @return mixed
   */
  public function getBody() {
    return $this->body;
  }

  /**
   * @param mixed $body
   */
  public function setBody($body) {
    $this->body = $body;
  }
  public function save(){

  }
}