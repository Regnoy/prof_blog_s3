<?php


namespace PageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Page
 * @package PageBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="page_data_field")
 */
class PageDataField {

  /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @ORM\OneToOne(targetEntity="Page")
   * @ORM\JoinColumn(name="entity_id", referencedColumnName="id")
   */

  private $entity;

  /**
   * @ORM\Column(type="string")
   */
  private $language;

  /**
   * @ORM\Column(type="string")
   */
  private $title;

  /**
   * @ORM\Column(type="integer")
   */
  private $user;
  /**
   * @ORM\Column(type="integer")
   */
  private $status;
  /**
   * @ORM\Column(type="datetime")
   */
  private $created;
  /**
   * @ORM\Column(type="datetime")
   */
  private $changed;


  public function __construct() {
    $this->status = 1;
    $date = new \DateTime();
    $this->created = $date;
    $this->changed = $date;
    $this->language = "en";
    $this->user = 0;
  }

  /**
   * Get id
   *
   * @return integer
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set language
   *
   * @param string $language
   *
   * @return PageDataField
   */
  public function setLanguage($language)
  {
    $this->language = $language;

    return $this;
  }

  /**
   * Get language
   *
   * @return string
   */
  public function getLanguage()
  {
    return $this->language;
  }

  /**
   * Set title
   *
   * @param string $title
   *
   * @return PageDataField
   */
  public function setTitle($title)
  {
    $this->title = $title;

    return $this;
  }

  /**
   * Get title
   *
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }

  /**
   * Set user
   *
   * @param integer $user
   *
   * @return PageDataField
   */
  public function setUser($user)
  {
    $this->user = $user;

    return $this;
  }

  /**
   * Get user
   *
   * @return integer
   */
  public function getUser()
  {
    return $this->user;
  }

  /**
   * Set status
   *
   * @param integer $status
   *
   * @return PageDataField
   */
  public function setStatus($status)
  {
    $this->status = $status;

    return $this;
  }

  /**
   * Get status
   *
   * @return integer
   */
  public function getStatus()
  {
    return $this->status;
  }

  /**
   * Set created
   *
   * @param \DateTime $created
   *
   * @return PageDataField
   */
  public function setCreated($created)
  {
    $this->created = $created;

    return $this;
  }

  /**
   * Get created
   *
   * @return \DateTime
   */
  public function getCreated()
  {
    return $this->created;
  }

  /**
   * Set changed
   *
   * @param \DateTime $changed
   *
   * @return PageDataField
   */
  public function setChanged($changed)
  {
    $this->changed = $changed;

    return $this;
  }

  /**
   * Get changed
   *
   * @return \DateTime
   */
  public function getChanged()
  {
    return $this->changed;
  }

  /**
   * Set entity
   *
   * @param \PageBundle\Entity\Page $entity
   *
   * @return PageDataField
   */
  public function setEntity(\PageBundle\Entity\Page $entity = null)
  {
    $this->entity = $entity;

    return $this;
  }

  /**
   * Get entity
   *
   * @return \PageBundle\Entity\Page
   */
  public function getEntity()
  {
    return $this->entity;
  }
}
