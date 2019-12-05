<?php

namespace App\Form;

use App\Entity\SportPlayer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use App\Entity\Media;


class SportPlayerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, ['label' => "Email", "required" => false])
            ->add('surname', TextType::class, ['label' => "Prénom"])
            ->add('name', TextType::class, ['label' => "Nom de famille"])
            ->add('birthday', DateType::class, ['label' => "Date d'anniversaire", 'format' => "dd-MM-yyyy", 'placeholder' => [
        'year' => 'Year',
    ], 'years' => range(date('Y') - 25, date('Y'))])
            ->add('statue', TextType::class, ['label' => "Statue"])
            ->add('create', SubmitType::class, [
                'label' => 'Créer/modifier joueur',
                'attr' => ['class' => 'btn btn-primary']])
            ->add('profil_image', EntityType::class, [
                    'class' => Media::class,
                    'multiple' => false,
                    'choice_label' => 'id'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SportPlayer::class,
        ]);
    }
}
