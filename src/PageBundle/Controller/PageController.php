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
use CoreBundle\Plugins\Entity\Forms\ContentEntityForm;
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
    $page->get('field_data');
    $page->get('field_body');
    $form = $this->createForm( ContentEntityForm::class, null, [
      'content_entity' => $page
    ] );
    $form->handleRequest($request);
    if($form->isSubmitted() && $page->validateForm($form->getData())){
      var_dump("valudation is action");
      var_dump($form->getData());
    }
    return $this->render('@Page/Page/add.html.twig', [
      'form' => $form->createView()
    ]);
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