<?php

namespace App\Controller;

use App\Entity\UserTbl;
use App\Form\LoginType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Validator\Constraints\IsNull;

class LoginController extends AbstractController
{
    #[Route('/', name: 'app_login')]
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $requsername = $request->get('email');
        $reqpassword = $request->get('password');
        $session = $request->getSession();
        if($requsername  &&  $reqpassword  ) {
       
            $articles = $doctrine-> getRepository(UserTbl::class)->findOneBy(array('name' => $requsername));
            if($articles){
                $password = $articles-> getPassword();
                    if($reqpassword == $password) {
                        $_SESSION['user']=$requsername;
                        return $this->redirectToRoute('app_article');
                    }
                $this->addFlash('danger', 'Kullanıcı parola hatası ');
                return $this->redirectToRoute('app_login');   
            }
        }
        return $this->render('login/index.html.twig', [
            'controller_name' => 'LoginController',
        ]);
    }

    #[Route('/register', name: 'app_register')]
    public function register(Request $request, ManagerRegistry $doctrine): Response
    {   
        $usertbl = new UserTbl();
        $form = $this->createFormBuilder($usertbl)
            ->add('name', EmailType::class, array('attr' =>array('class' => 'form-control')))
            ->add('password', PasswordType::class, array('required' =>false,
            'attr' =>array('class' =>'form-control')))
            ->add('save', SubmitType::class, array(
            'label' =>'Create',
            'attr' =>array('class'=>'btn btn-primary mt-3')
            ))
        ->getForm();
      $form->handleRequest($request);
      if($form->isSubmitted() && $form->isValid()){
        $userTbl = $form->getData();
        $entityManager =$doctrine->getManager();
        $entityManager->persist($userTbl);
        $entityManager->flush();
        
        $this->addFlash('success', 'Kullanıcı Kaydı Başarılı ');
        return $this->redirectToRoute('app_register');
        
    }
    return $this->render('login/register.html.twig', [
        'our_form' => $form->createView(),
    ]);
    }
}