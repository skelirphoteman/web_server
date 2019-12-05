<?php

namespace App\Form;

use App\Entity\CaracteristicsSportPlayer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use App\Entity\SportPlayer;

class CaracteristicsSportPlayerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('team', TextType::class)
            ->add('level', TextType::class)
            ->add('position', TextType::class)
            ->add('strong_foot', TextType::class)
            ->add('weight', TextType::class)
            ->add('size', TextType::class)
            ->add('sportPlayer', EntityType::class, [
                    'class' => SportPlayer::class,
                    'multiple' => false,
                    'choice_label' => 'name'
            ])
            ->add('submit', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CaracteristicsSportPlayer::class,
        ]);
    }
}
