<?php

namespace App\Controller;

use App\Entity\UserTbl;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class ArticleController extends AbstractController
{
    #[Route('/article', name: 'app_article')]
    public function article(ManagerRegistry $doctrine){
        $articles = $doctrine->getRepository(UserTbl::class)->findAll();
        return $this->render('article/index.html.twig', array('articles' => $articles)); 
      }
      #[Route('/articleDetail/{id}', name:'app_articleDetail')]
      public function roomDetail($id,ManagerRegistry $doctrine){
      $company = $doctrine->getRepository(UserTbl::class)->find($id);
      return $this->render('article/show.html.twig', array('article' =>$company));
    
      }
      #[Route('/articleDelete/{id}', name:'app_articledelete')]
      public function articledelete(Request $request, $id,ManagerRegistry $doctrine){
        $article = $doctrine->getRepository(UserTbl::class)->find($id);
  
        $entityManager =$doctrine->getManager();
        $entityManager->remove($article);
        $entityManager->flush();
  
        return $this->redirectToRoute('app_article');
      }

      #[Route('/articleUpdate/{id}', name:'app_articleUpdate')]
      public function articleUpdate(Request $request, $id,ManagerRegistry $doctrine){
  
          $article = $doctrine->getRepository(UserTbl::class)->find($id);
        
          $form = $this->createFormBuilder($article)
                       ->add('name', TextType::class, array('attr' =>array('class' => 'form-control')))
                       ->add('password', TextType::class, array('attr' =>array('class' => 'form-control')))
                       ->add('save', SubmitType::class, array( 'label' =>'Update','attr' =>array('class'=>'btn btn-primary mt-3')))
                       ->getForm();
        
          $form->handleRequest($request);
        
          if($form->isSubmitted() && $form->isValid()){
        
              $entityManager =$doctrine->getManager();
            $entityManager->flush();
        
            return $this->redirectToRoute('app_article');
          }
        
          return $this->render('article/articleUpdate.twig',array(
            'form'=>$form->createView()
          ));
        }
     
}

