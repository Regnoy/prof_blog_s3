<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 7/11/2017
 * Time: 8:52 AM
 */

namespace PageBundle\Forms;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PageBasicForm extends AbstractType {



  public function configureOptions(OptionsResolver $resolver) {

  }

  public function buildForm(FormBuilderInterface $builder, array $options) {
    $builder->add('title', TextType::class, [
      'label' => 'Title'
    ]);
    $builder->add('body', TextareaType::class, [
      'label' => 'Body'
    ]);
    $builder->add('submit', SubmitType::class, [
      'label' => 'Save'
    ]);
  }
}