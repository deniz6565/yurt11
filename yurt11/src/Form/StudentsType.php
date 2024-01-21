<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\DBAL\Types\TextType;
use FG\ASN1\Universal\Integer;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class StudentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('TC',Integer::class)
        ->add('student_name',TextType::class)
        ->add('student_surname', TextType::class)
        ->add('student_email',TextType::class)
        ->add('student_phone', TextType::class)
        ->add('student_gender', TextType::class)
        ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
