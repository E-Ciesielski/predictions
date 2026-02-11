<?php

namespace App\Form;

use App\Entity\Club;
use App\Entity\Game;
use App\Entity\Stadium;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('startDateTime')
            ->add('gameWeek')
            ->add('homeTeam', EntityType::class, [
                'class' => Club::class,
                'choice_label' => 'name',
            ])
            ->add('awayTeam', EntityType::class, [
                'class' => Club::class,
                'choice_label' => 'name',
            ])
            ->add('stadium', EntityType::class, [
                'class' => Stadium::class,
                'choice_label' => 'name',
            ])
            ->add('homeScore')
            ->add('awayScore')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Game::class,
        ]);
    }
}
