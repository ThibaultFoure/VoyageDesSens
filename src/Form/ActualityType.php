<?php

namespace App\Form;

use App\Entity\Actuality;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ActualityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, ['label' => 'Titre'])
            ->add('content', CKEditorType::class, [
                'label' => 'Contenu',
            ])
            ->add('mediaFile', VichImageType::class, [
                'label' => 'Image',
                'download_label' => 'Télécharger l\'image/vidéo',
                'delete_label' => 'Supprimer l\'image/vidéo',
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Actuality::class,
        ]);
    }
}
