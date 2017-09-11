<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 7/6/2017
 * Time: 9:20 AM
 */

namespace PageBundle\Controller;

use CoreBundle\Plugins\Core;
use CoreBundle\Plugins\Entity\Annotation\ContentEntityView;
use Doctrine\Common\Annotations\AnnotationReader;
use PageBundle\Entity\Page;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PageController extends Controller {
  public function addAction($type, Request $request){
    $pageType = Page::getTypeDefinition($type);
    $entityManager = $this->get('entity.manager');
    if(!$pageType){

      $types = $entityManager->getType('page');
      return $this->render('@Page/Page/view.html.twig',[
        'types' => $types
      ]);
    }
//    var_dump($entityManager->getFieldDefinition());
    $page = new Page();
    $page->setType($type);
    var_dump($page->getFieldDefinition());
    return $this->render('html.html.twig');
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

  public function testAction(){
    $page = new Page();

    $contentEntityManager = Core::$container->get('content.entity.mamager');
    $types = $contentEntityManager->getType('page');
    var_dump($types);

    //print_r($tmpArr);
    //==========
//    $annotationReader = new AnnotationReader();
//    $annotation = $annotationReader->getClassAnnotation( new \ReflectionClass(Page::class), ContentEntityView::class );
//    if(!$annotation){
//      var_dump("is not annotation");
//    }
//    var_dump($annotation);

    return $this->render('::html.html.twig');
  }
}