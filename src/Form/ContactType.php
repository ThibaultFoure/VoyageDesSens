<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Votre prénom',
                ],
            ])
            ->add('lastname', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Votre nom',
                ],
            ])
            ->add('phone', IntegerType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Téléphone',
                    'type' => 'number',
                ],
            ])
            ->add('mail', EmailType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Adresse mail',
                    'class' => 'form-control',
                ],
            ])
            ->add('message', TextareaType::class, [
                'attr' => ['rows' => 6],
            ])
            ->add('reason', ChoiceType::class, [
                'label' => 'Sujet de votre message',
                'attr' => [
                    'placeholder' => 'Sujet de votre message',
                ],
                'choices' => [
                    'Veuillez sélectionner un sujet' => 'Veuillez sélectionner un sujet',
                    'Demande de renseignement' => 'Demande de renseignements',
                    'Prise de rendez-vous' => 'Prise de rendez-vous',
                ],
                'choice_attr' => [
                    'Veuillez sélectionner un sujet' => [
                        'disabled' => 'disabled',
                        'selected' => 'selected'
                    ],
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([]);
    }
}
