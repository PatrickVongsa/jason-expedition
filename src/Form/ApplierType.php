<?php

namespace App\Form;

use App\Entity\Applier;
use App\Entity\Experience;
use App\Entity\Gender;
use App\Entity\Profession;
use App\Entity\Weapon;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ApplierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'attr' => [
                    'placeholder' => 'Prénom',
                ],
                'row_attr' => [
                    'class' => 'form-floating  mb-3',
                ],
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'Nom',
                ],
                'row_attr' => [
                    'class' => 'form-floating  mb-3',
                ],
            ])
            ->add('age', IntegerType::class, [
                'label' => 'Age',
                'attr' => [
                    'placeholder' => 'Age',
                ],
                'row_attr' => [
                    'class' => 'form-floating  mb-3',
                ],
            ])
            ->add('height', IntegerType::class, [
                'label' => 'Taille (cm)',
                'attr' => [
                    'placeholder' => 'Taille (cm)',
                ],
                'row_attr' => [
                    'class' => 'form-floating  mb-3',
                ],
            ])
            ->add('origin', TextType::class, [
                'label' => 'Origine',
                'attr' => [
                    'placeholder' => 'Origine',
                ],
                'row_attr' => [
                    'class' => 'form-floating  mb-3',
                ],
            ])
            ->add('gender', EntityType::class, [
                'label' => 'Genre',
                'class' => Gender::class,
                'choice_label' => 'gender',
                'multiple' => false,
                'expanded' => false,
                'row_attr' => [
                    'class' => 'form-floating  mb-3',
                ],
            ])
            ->add('profession', EntityType::class, [
                'label' => 'Métier',
                'class' => Profession::class,
                'choice_label' => 'profession',
                'multiple' => false,
                'expanded' => false,
                'row_attr' => [
                    'class' => 'form-floating mb-3',
                ],
            ])
            ->add('warriorSkill', EntityType::class, [
                'label' => 'Expérience au combat',
                'class' => Experience::class,
                'choice_label' => 'experience',
                'multiple' => false,
                'expanded' => false,
                'row_attr' => [
                    'class' => 'form-floating  mb-3',
                ],
            ])
            ->add('navigationSkill', EntityType::class, [
                'label' => 'Expérience en navigation',
                'class' => Experience::class,
                'choice_label' => 'experience',
                'multiple' => false,
                'expanded' => false,
                'row_attr' => [
                    'class' => 'form-floating  mb-3',
                ],
            ])
            ->add('weapon', EntityType::class, [
                'label' => 'Arme de prédilection',
                'class' => Weapon::class,
                'choice_label' => 'weapon',
                'multiple' => false,
                'expanded' => false,
                'row_attr' => [
                    'class' => 'form-floating  mb-3',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Applier::class,
        ]);
    }
}
