<?php


namespace PageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Page
 * @package PageBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="page_field_body")
 */
class PageBodyField {
  /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @ORM\Column(type="string", length=40)
   */
  private $language;

  /**
   * @ORM\OneToOne(targetEntity="Page")
   * @ORM\JoinColumn(name="entity_id", referencedColumnName="id")
   */
  private $entity;

  /**
   * @ORM\Column(type="text")
   */
  private $body;

  public function __construct() {
    $this->language = 'en';
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
     * @return PageBodyField
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
     * Set body
     *
     * @param string $body
     *
     * @return PageBodyField
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set entity
     *
     * @param \PageBundle\Entity\Page $entity
     *
     * @return PageBodyField
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
