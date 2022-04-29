<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fullName',TextType::class, [
                'label' => 'Name',
                'attr' => array(
                    'placeholder' => 'Votre nom'
                )
            ])
            ->add('email',EmailType::class, [
                'label' => 'Email',
                'attr' => array(
                    'placeholder' => 'email@gmail.com'
                )
            ])
            ->add('subject', TextType::class,[
                'label' => 'Name',
                'attr' => array(
                    'placeholder' => 'Votre sujet'
                )
            ])
            ->add('message', TextareaType::class, [
                'attr' => ['rows' => 3, 'placeholder' => 'Votre message'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
