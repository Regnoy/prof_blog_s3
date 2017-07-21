<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 7/11/2017
 * Time: 8:47 AM
 */

namespace PageBundle\Forms;


use PageBundle\Forms\Model\PageArticleModel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PageArticleForm extends AbstractType {

  public function buildForm(FormBuilderInterface $builder, array $options) {
    $builder->add('title', TextType::class, [
      'label' => 'Title'
    ]);
    $builder->add('body', TextareaType::class, [
      'label' => 'Body'
    ]);
    $builder->add('category', ChoiceType::class, [
      'label' => 'Category',
      'choices' => [
        1 => 'Anime',
        2 => 'Film'
      ]
    ]);
    $builder->add('submit', SubmitType::class, [
      'label' => 'Save'
    ]);
  }

  public function configureOptions(OptionsResolver $resolver) {
    $resolver->setDefaults([
      'data_class' => PageArticleModel::class
    ]);
  }
}