<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 7/6/2017
 * Time: 9:20 AM
 */

namespace PageBundle\Controller;

use PageBundle\Entity\Page;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PageController extends Controller {
  public function addAction($type, Request $request){
    $pageType = Page::getTypeDefinition($type);
    if(!$pageType){
      $types = Page::typeDefinition();
      return $this->render('@Page/Page/view.html.twig',[
        'types' => array_keys($types)
      ]);
    }
    $pageModel = new $pageType['model']();
    $form = $this->createForm($pageType['form'], $pageModel);
    $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid() ){
      $pageModel->save();
    }
    return $this->render('@Page/Page/edit.html.twig',[
      'form' => $form->createView()
    ]);
//    if(!$type)

//      throw $this->createNotFoundException('This page type not found');

  }

  public function viewAction($id){
    var_dump("View add" .$id);
    return $this->render('@Web/Page/page.html.twig');
  }

  public function editAction($id){
    var_dump("edit add" .$id);
    return $this->render('@Web/Page/page.html.twig');
  }
}