<?php

namespace PageBundle\Entity;

use CoreBundle\Plugins\Entity\EntityFieldInterface;
use Doctrine\ORM\Mapping as ORM;
use CoreBundle\Plugins\Fields\Annotation\FieldStorage;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class Page
 * @package PageBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="page_field_category")
 * @FieldStorage(
 *   id = "field_category"
 * )
 */
class PageCategoryField implements EntityFieldInterface {
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
   * @ORM\Column(type="integer")
   */
  private $category;

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
     * @return PageCategoryField
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
     * Set category
     *
     * @param integer $category
     *
     * @return PageCategoryField
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return integer
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set entity
     *
     * @param \PageBundle\Entity\Page $entity
     *
     * @return PageCategoryField
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

  public function buildForm(FormBuilderInterface $builder, array $options) {
    $builder->add('field_category', ChoiceType::class, [
      'label' => 'Category',
      'choices' => [
        1 => 'Categ 1',
        2 => 'Categ 2'
      ]
    ]);
  }
}
