<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 9/11/2017
 * Time: 9:18 AM
 */

namespace CoreBundle\Plugins\Entity;


use Symfony\Component\Form\Test\FormBuilderInterface;

interface EntityFieldInterface {

  public function buildForm(FormBuilderInterface $builder, array $options);
}