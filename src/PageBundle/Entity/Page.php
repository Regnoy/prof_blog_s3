<?php


namespace PageBundle\Entity;

use CoreBundle\Extend\ContentEntity\Content\ContentEntity;
use CoreBundle\Plugins\Entity\Entity;
use Doctrine\ORM\Mapping as ORM;
use PageBundle\Forms\Model\PageArticleModel;
use PageBundle\Forms\Model\PageBasicModel;
use PageBundle\Forms\PageArticleForm;
use PageBundle\Forms\PageBasicForm;
use CoreBundle\Extend\ContentEntity\Annotation\ContentType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class Page
 * @package PageBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="page")
 * @ContentType(
 *   id = "page",
 *   tableData = {
        "class" = "PageBundle\Entity\PageDataField"
 *   }
 * )
 */
class Page extends ContentEntity  {

  /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;
  /**
   * @ORM\Column(type="string", length=40)
   */
  private $type;

  /**
   * @ORM\Column(type="datetime")
   */
  private $created;

  public function __construct() {
    $this->created = new \DateTime();
  }

  /**
   * @return array@
   * @deprecated
   */
  public static function typeDefinition(){
    return [
      'article' => [
        'form' => PageArticleForm::class,
        'model' => PageArticleModel::class
      ],
      'basic' => [
        'form' => PageBasicForm::class,
        'model' => PageBasicModel::class
      ]
    ];
  }

  /**
   * @param $type
   * @return mixed|null
   * @deprecated
   */
  public static function getTypeDefinition($type){
    $types = static::typeDefinition();

    return isset($types[$type]) ? $types[$type] : null;
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
   * Set type
   *
   * @param string $type
   *
   * @return Page
   */
  public function setType($type)
  {
    $this->type = $type;

    return $this;
  }

  /**
   * Get type
   *
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }

  /**
   * Set created
   *
   * @param \DateTime $created
   *
   * @return Page
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

  public function id() {
    return $this->id();
  }

  public function title() {
    return 'Some title';
  }

  public function addLink() {
    return 'page_add';
  }

  public function editLink() {
    return 'page_edit';
  }

  public function canonicalLink() {
    return 'page_view';
  }

  public function formWidget(){

  }

  public function formmaterWidget(){

  }
  public static function save($page){

  }

  public function buildForm(FormBuilderInterface $builder, array $options) {
    $fieldDefinitions = $this->getFieldDefinition();
    foreach ($fieldDefinitions as $definition){
      if(!isset($definition['class']))
        continue;
      $instanceField = $definition['class'];
      $fieldEntity = new $instanceField();
      $fieldEntity->buildForm($builder, $options);
    }
  }
  public function validateForm($data){
    return true;
  }
}
