<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 7/11/2017
 * Time: 8:51 AM
 */

namespace PageBundle\Forms\Model;


use CoreBundle\Plugins\Core;
use PageBundle\Entity\Page;
use PageBundle\Entity\PageBodyField;
use PageBundle\Entity\PageCategoryField;
use PageBundle\Entity\PageDataField;
use Symfony\Component\Validator\Constraints as Assert;

class PageArticleModel {


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
   * @Assert\NotBlank()
   */
  private $category;

  public function getTitle() {
    return $this->title;
  }

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
    $em = Core::em();
    $page = new Page();
    $page->setType('article');
    $em->persist($page);
    $pageDataField = new PageDataField();
    $pageDataField->setEntity($page)->setTitle($this->title);
    $em->persist($pageDataField);
    $pageBodyField= new PageBodyField();
    $pageBodyField->setEntity($page)->setBody($this->body);
    $em->persist($pageBodyField);
    $pageCategoryField = new PageCategoryField();
    $pageCategoryField->setEntity($page)->setCategory($this->category);
    $em->persist($pageCategoryField);

    $em->flush();



  }
}