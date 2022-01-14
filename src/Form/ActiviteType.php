<?php

namespace App\Form;

use App\Entity\Activite;
use App\Entity\Contenu;
use App\Entity\Eleve;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActiviteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('contenu', EntityType::class, [

                'class' => Contenu::class,
                'choice_label' => 'nom',
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('eleves', EntityType::class, [

                'class' => Eleve::class,
                'choice_label' => 'nom',
                'multiple' => true,
                'expanded' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Activite::class,
        ]);
    }
}
