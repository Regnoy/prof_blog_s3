<?php


namespace PageBundle\Forms\Model;

use CoreBundle\Plugins\Core;
use PageBundle\Entity\Page;
use PageBundle\Entity\PageBodyField;
use PageBundle\Entity\PageDataField;
use Symfony\Component\Validator\Constraints as Assert;

class PageBasicModel {

  /**
   * @Assert\NotBlank(
   *   message = "Title is required"
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
    $em = Core::em();
    $page = new Page();
    $page->setType('basic');
    $em->persist($page);
    $pageDataField = new PageDataField();
    $pageDataField->setEntity($page)->setTitle($this->title);
    $em->persist($pageDataField);
    $pageBodyField= new PageBodyField();
    $pageBodyField->setEntity($page)->setBody($this->body);
    $em->persist($pageBodyField);
    $em->flush();

  }
}