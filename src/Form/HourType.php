<?php

namespace App\Form;

use App\Entity\Hour;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;

class HourType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {   
       
        $builder
            ->add('day', ChoiceType::class, [
                'choices' => [
                    'lundi' => 'lundi', 
                    'mardi' => 'mardi', 
                    'mercredi' => 'mercredi', 
                    'jeudi' => 'jeudi',
                    'vendredi' => 'vendredi', 
                    'samedi' => 'samedi', 
                    'dimanche' => 'dimanche'
                ],
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('startDate', TimeType::class, [
                'widget' => 'single_text',
                'required' => false,
            ])
            ->add('endDate', TimeType::class, [
                'widget' => 'single_text',
                'required' => false,

            ])
            ->add('closed')
        ;

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Hour::class,
        ]);
    }
}
