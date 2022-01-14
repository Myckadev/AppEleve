<?php

namespace App\Form;

use App\Entity\Activite;
use App\Entity\Competence;
use App\Entity\Contenu;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContenuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('competence', EntityType::class, [

                'class' => Competence::class,
                'choice_label' => 'nom',
                'multiple' => true,
                'expanded' => true,
            ])
        ;

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contenu::class,
        ]);
    }
}
