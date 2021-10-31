<?php

namespace App\Form;

use App\Entity\Applier;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ApplierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('age')
            ->add('height')
            ->add('origin')
            ->add('gender')
            ->add('profession')
            ->add('warriorSkill')
            ->add('navigationSkill')
            ->add('Weapon')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Applier::class,
        ]);
    }
}
