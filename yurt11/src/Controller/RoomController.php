<?php

namespace App\Controller;

use App\Entity\RoomTbl;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class RoomController extends AbstractController
{
    #[Route('/room', name:'app_room')]
    public function room(ManagerRegistry $doctrine){
    $articles = $doctrine->getRepository(RoomTbl::class)->findAll();
    return $this->render('room/index.html.twig', array('articles' =>$articles));
 
  }
  #[Route('/roomDetail/{id}', name:'app_roomDetail')]
  public function roomDetail($id,ManagerRegistry $doctrine){
  $company = $doctrine->getRepository(RoomTbl::class)->find($id);
  return $this->render('room/show.html.twig', array('room' =>$company));

  }
  //veri silme
  #[Route('/roomDelete/{id}', name:'app_roomdelete')]
    public function delete(Request $request, $id,ManagerRegistry $doctrine){
      $article = $doctrine->getRepository(RoomTbl::class)->find($id);

      $entityManager =$doctrine->getManager();
      $entityManager->remove($article);
      $entityManager->flush();

      return $this->redirectToRoute('app_room');
    }

  #[Route('/roomAdd', name: 'app_roomAdd')]
    public function roomAdd(Request $request, ManagerRegistry $doctrine): Response
    {   
        $room = new RoomTbl();
        $form = $this->createFormBuilder($room)
            ->add('room_name', TextType::class, array('attr' =>array('class' => 'form-control')))
            ->add('room_number', TextType::class, array('attr' =>array('class' => 'form-control')))
            ->add('bed_capacity', TextType::class, array('attr' =>array('class' => 'form-control')))
            ->add('save', SubmitType::class, array('label' =>'Create','attr' =>array('class'=>'btn btn-primary mt-3') ))
        ->getForm();
      $form->handleRequest($request);
      if($form->isSubmitted() && $form->isValid()){
        $room = $form->getData();
        $entityManager =$doctrine->getManager();
        $entityManager->persist($room);
        $entityManager->flush();
        
        $this->addFlash('success', 'Oda Kaydı Başarılı ');
        return $this->redirectToRoute('app_roomAdd');
        
    }
    return $this->render('room/roomAdd.twig', [
        'our_form' => $form->createView(),
    ]);
    }
    //veri güncelleme
    #[Route('/roomUpdate/{id}', name:'app_roomUpdate')]
    public function studentUpdate(Request $request, $id,ManagerRegistry $doctrine){

        $article = $doctrine->getRepository(RoomTbl::class)->find($id);
      
        $form = $this->createFormBuilder($article)
                     ->add('room_name',TextType::class)
                     ->add('room_number', TextType::class, array('attr' =>array('class' => 'form-control')))
                     ->add('bed_capacity', TextType::class, array('attr' =>array('class' => 'form-control')))
                     ->add('save', SubmitType::class, array( 'label' =>'Update','attr' =>array('class'=>'btn btn-primary mt-3')))

                     ->getForm();
      
        $form->handleRequest($request);
      
        if($form->isSubmitted() && $form->isValid()){
      
            $entityManager =$doctrine->getManager();
          $entityManager->flush();
      
          return $this->redirectToRoute('app_room');
        }
      
        return $this->render('room/roomUpdate.twig',array(
          'form'=>$form->createView()
        ));
      }


    
}
