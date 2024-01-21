<?php

namespace App\Controller;

use App\Entity\CompanyTbl;
use App\Entity\StudentTbl;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Validator\Constraints\IsNull;

class CompanyController extends AbstractController
{
    
   //veri gösterme
   #[Route('/company', name:'app_company')]
   public function company(ManagerRegistry $doctrine){
    $articles = $doctrine->getRepository(CompanyTbl::class)->findAll();
   return $this->render('company/index.html.twig', array('articles' =>$articles));

 }
 //veri detayı
    #[Route('/companyDetail/{id}', name:'app_companyDetail')]
    public function companyDetail($id,ManagerRegistry $doctrine){
    $company = $doctrine->getRepository(CompanyTbl::class)->find($id);
    return $this->render('company/show.html.twig', array('company' =>$company));

    }
    
 //veri ekleme
 #[Route('/companyRegister', name: 'app_companyRegister')]
    public function companyRegister(Request $request, ManagerRegistry $doctrine): Response
    {   
        $company = new CompanyTbl();
        $form = $this->createFormBuilder($company)
            ->add('company_name', TextType::class, array('attr' =>array('class' => 'form-control')))
            ->add('company_phone', TextType::class, array('attr' =>array('class' => 'form-control')))
            ->add('company_adress', TextType::class, array('attr' =>array('class' => 'form-control')))
            ->add('company_logo', TextType::class, array('attr' =>array('class' => 'form-control')))
            ->add('save', SubmitType::class, array('label' =>'Create','attr' =>array('class'=>'btn btn-primary mt-3') ))
        ->getForm();
      $form->handleRequest($request);
      if($form->isSubmitted() && $form->isValid()){
        $company = $form->getData();
        $entityManager =$doctrine->getManager();
        $entityManager->persist($company);
        $entityManager->flush();
        
        $this->addFlash('success', 'Kullanıcı Kaydı Başarılı ');
        return $this->redirectToRoute('app_company');
        
    }
    return $this->render('company/companyRegister.twig', [
        'our_form' => $form->createView(),
    ]);
    }
    //veri silme
    #[Route('/companyDelete/{id}', name:'app_companydelete')]
    public function delete(Request $request, $id,ManagerRegistry $doctrine){
      $article = $doctrine->getRepository(CompanyTbl::class)->find($id);

      $entityManager =$doctrine->getManager();
      $entityManager->remove($article);
      $entityManager->flush();

      return $this->redirectToRoute('app_company');
    }
    //veri güncelleme
    #[Route('/companyUpdate/{id}', name:'app_companyUpdate')]
    public function companyUpdate(Request $request, $id,ManagerRegistry $doctrine){

        $article = $doctrine->getRepository(CompanyTbl::class)->find($id);
      
        $form = $this->createFormBuilder($article)
                     ->add('company_name', TextType::class, array('attr' =>array('class' => 'form-control')))
                     ->add('company_phone', TextType::class, array('attr' =>array('class' => 'form-control')))
                     ->add('company_adress', TextType::class, array('attr' =>array('class' => 'form-control')))
                     ->add('company_logo', TextType::class, array('attr' =>array('class' => 'form-control')))
                     ->add('save', SubmitType::class, array( 'label' =>'Update','attr' =>array('class'=>'btn btn-primary mt-3')))
                     ->getForm();
      
        $form->handleRequest($request);
      
        if($form->isSubmitted() && $form->isValid()){
      
            $entityManager =$doctrine->getManager();
          $entityManager->flush();
      
          return $this->redirectToRoute('app_company');
        }
      
        return $this->render('company/companyUpdate.twig',array(
          'form'=>$form->createView()
        ));
      }

    
    
    
}