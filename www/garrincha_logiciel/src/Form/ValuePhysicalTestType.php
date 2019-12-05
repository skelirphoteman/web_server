<?php

namespace App\Form;

use App\Entity\ValuePhysicalTest;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;


use App\Entity\SportPlayer;
use App\Entity\PhysicalTest;
use App\Entity\CategoriesTest;

class ValuePhysicalTestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('value', TextType::class)
            ->add('_at', DateType::class)
            ->add('options', TextType::class, ['required' => false])
            ->add('sport_player', EntityType::class, [
                    'class' => SportPlayer::class,
                    'multiple' => false,
                    'choice_label' => 'name'
            ])
            ->add('physical_test', EntityType::class, [
                    'class' => PhysicalTest::class,
                    'multiple' => false,
                    'choice_label' => 'name'
            ])
            ->add('categoriesTest', EntityType::class, [
                    'class' => CategoriesTest::class,
                    'multiple' => false,
                    'choice_label' => 'name'
            ])
            ->add('create', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ValuePhysicalTest::class,
        ]);
    }
}
