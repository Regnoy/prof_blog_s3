<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 8/7/2017
 * Time: 10:08 AM
 */

namespace CoreBundle\Plugins\Entity\Forms;


use PageBundle\Entity\Page;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContentEntityForm extends ContentEntityBaseForm  {

  public function buildForm(FormBuilderInterface $builder, array $options) {
    /** @var Page $entity */
    $entity = $options['content_entity'];
    $entity->buildForm($builder, $options);
    $builder->add('save', SubmitType::class,[
      'label' => 'Save'
    ]);
  }

  public function configureOptions(OptionsResolver $resolver) {
    $resolver->setDefault('content_entity', null);
  }
}