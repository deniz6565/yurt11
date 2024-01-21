<?php

namespace App\Controller;

use App\Entity\RoomTbl;
use App\Entity\StudentTbl;
use App\Entity\RoomStudentMapp;
use App\Form\RoomStudentMappType;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class RoomStudentMappController extends AbstractController
{ 
  #[Route('/room_student_mapp', name:'app_room_student_mapp')]
  public function room(ManagerRegistry $doctrine){
    $form = $this->createForm(RoomStudentMappType::class);
    return $this->render('room_student_mapp/index.html.twig',array(
    'our_form' => $form->createView()));
   
}
 /*
    #[Route('/room_student_mapp', name:'room_student_mapp')]
     public function roomStudentMapp(Request $request, EntityManagerInterface $entityManager): Response
    {
        $roomStudentMapp = new RoomStudentMapp();
        $send = $this->createForm(RoomStudentMappType::class, $roomStudentMapp);

        $send->handleRequest($request);

        if ($send->isSubmitted() && $send->isValid()) {
            $data = $send->getData();
            $entityManager->persist($roomStudentMapp);
            $entityManager->flush();
        }

        $this->addFlash('success', 'Öğrenci Yerleştirme işlemi tamamlanmıştır.');
        return $this->render('/roomstudentmapp/index.html.twig', [
            'form' => $send->createView(), 
        ]);
    }*/
    #[Route('/room_student_mapp', name: 'app_room_student_mapp')]
    public function studentAdd(Request $request, ManagerRegistry $doctrine): Response
    {   
        $student = new roomStudentMapp();
        $form = $this->createFormBuilder($student)
        ->add('StudentID',  EntityType::class,['class' => StudentTbl::class,'choice_label' => 'TC'])   
        ->add('RoomID',  EntityType::class,[ 'class' => RoomTbl::class, 'choice_label' => 'room_number'])
        ->add('save', SubmitType::class, array('label' =>'Create','attr' =>array('class'=>'btn btn-primary mt-3') ))
        ->getForm();
      $form->handleRequest($request);
      if($form->isSubmitted() && $form->isValid()){
        $student = $form->getData();
        $entityManager =$doctrine->getManager();
        $entityManager->persist($student);
        $entityManager->flush();
        
        $this->addFlash('success', 'Öğrenci Kaydı Başarılı ');
        return $this->redirectToRoute('app_room_student_mapp');
        
    }
    return $this->render('room_student_mapp/index.html.twig', [
        'our_form' => $form->createView(),
    ]);
    }
}





