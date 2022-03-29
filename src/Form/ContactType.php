<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
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
                'label' => 'Votre prénom'
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Votre nom'
            ])
            ->add('phone', TextType::class, [
                'label' => 'Téléphone'
            ])
            ->add('mail', EmailType::class, [
                'label' => 'Adresse mail'
            ])
            ->add('message', TextareaType::class, [
                'attr' => ['rows' => 6],
            ])
            ->add('reason', ChoiceType::class, [
                'label' => 'Sujet de votre message',
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
