<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 7/11/2017
 * Time: 8:51 AM
 */

namespace PageBundle\Forms\Model;

use Symfony\Component\Validator\Constraints as Assert;

class PageArticleModel {


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
   * @Assert\NotBlank()
   */
  private $category;

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

  /**
   * @return mixed
   */
  public function getCategory() {
    return $this->category;
  }

  /**
   * @param mixed $category
   */
  public function setCategory($category) {
    $this->category = $category;
  }
  public function save(){

  }
}