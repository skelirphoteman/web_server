<?php

namespace App\Form;

use App\Entity\PhysicalTest;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PhysicalTestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, ['label' => "Nom du test"])
            ->add('unity', TextType::class, ['required'   => false,'label' => "Unité du test"])
            ->add('create', SubmitType::class, [
                'label' => 'Créer/modifier un test physique',
                'attr' => ['class' => 'btn btn-primary']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PhysicalTest::class,
        ]);
    }
}
