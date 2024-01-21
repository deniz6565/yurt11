<?php

namespace App\Controller;

use App\Entity\StudentTbl;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class StudentController extends AbstractController
{
    #[Route('/student', name:'app_student')]
    public function student(ManagerRegistry $doctrine){
    $articles = $doctrine->getRepository(StudentTbl::class)->findAll();
    return $this->render('student/index.html.twig', array('articles' =>$articles));
 
  }
  #[Route('/studentDetail/{id}', name:'app_studentDetail')]
    public function studentDetail($id,ManagerRegistry $doctrine){
    $company = $doctrine->getRepository(StudentTbl::class)->find($id);
    return $this->render('student/show.html.twig', array('student' =>$company));

    }
     //veri silme
  #[Route('/studentDelete/{id}', name:'app_studentdelete')]
  public function delete(Request $request, $id,ManagerRegistry $doctrine){
    $article = $doctrine->getRepository(StudentTbl::class)->find($id);

    $entityManager =$doctrine->getManager();
    $entityManager->remove($article);
    $entityManager->flush();

    return $this->redirectToRoute('app_student');
  }

  #[Route('/studentAdd', name: 'app_studentAdd')]
    public function studentAdd(Request $request, ManagerRegistry $doctrine): Response
    {   
        $student = new StudentTbl();
        $form = $this->createFormBuilder($student)
            ->add('TC', TextType::class, array('attr' =>array('class' => 'form-control')))    
            ->add('student_name', TextType::class, array('attr' =>array('class' => 'form-control')))
            ->add('student_surname', TextType::class, array('attr' =>array('class' => 'form-control')))
            ->add('student_email', TextType::class, array('attr' =>array('class' => 'form-control')))
            ->add('student_phone', TextType::class, array('attr' =>array('class' => 'form-control')))
            ->add('student_gender', TextType::class, array('attr' =>array('class' => 'form-control')))
            ->add('save', SubmitType::class, array('label' =>'Create','attr' =>array('class'=>'btn btn-primary mt-3') ))
        ->getForm();
      $form->handleRequest($request);
      if($form->isSubmitted() && $form->isValid()){
        $student = $form->getData();
        $entityManager =$doctrine->getManager();
        $entityManager->persist($student);
        $entityManager->flush();
        
        $this->addFlash('success', 'Öğrenci Kaydı Başarılı ');
        return $this->redirectToRoute('app_student');
        
    }
    return $this->render('student/studentAdd.twig', [
        'our_form' => $form->createView(),
    ]);
    }
    //veri güncelleme
    #[Route('/studentUpdate/{id}', name:'app_studentUpdate')]
    public function studentUpdate(Request $request, $id,ManagerRegistry $doctrine){

        $article = $doctrine->getRepository(StudentTbl::class)->find($id);
      
        $form = $this->createFormBuilder($article)
                     ->add('TC',TextType::class)
                     ->add('student_name', TextType::class, array('attr' =>array('class' => 'form-control')))
                     ->add('student_surname', TextType::class, array('attr' =>array('class' => 'form-control')))
                     ->add('student_email', TextType::class, array('attr' =>array('class' => 'form-control')))
                     ->add('student_phone', TextType::class, array('attr' =>array('class' => 'form-control')))
                     ->add('student_gender', TextType::class, array('attr' =>array('class' => 'form-control')))
                     ->add('save', SubmitType::class, array( 'label' =>'Update','attr' =>array('class'=>'btn btn-primary mt-3')))

                     ->getForm();
      
        $form->handleRequest($request);
      
        if($form->isSubmitted() && $form->isValid()){
      
            $entityManager =$doctrine->getManager();
          $entityManager->flush();
      
          return $this->redirectToRoute('app_student');
        }
      
        return $this->render('student/studentUpdate.html.twig',array(
          'form'=>$form->createView()
        ));
      }



}
