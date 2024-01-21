<?php

namespace App\Form;
use App\Entity\RoomStudentMapp;
use App\Entity\StudentTbl;
use App\Entity\RoomTbl;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class RoomStudentMappType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->
        add('StudentID',  EntityType::class,[
            'class' => StudentTbl::class,
            'choice_label' => 'studentId'
        ])
        ->add('RoomID',  EntityType::class,[
            'class' => RoomTbl::class,
            'choice_label' => 'roomId'
        ])
        ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
