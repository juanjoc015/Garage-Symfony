<?php

namespace App\Form;

use App\Entity\Hour;
use App\Enum\DaysEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class HourType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('day', ChoiceType::class, [
                'label' => 'Jour',
                'choices' => array_flip(DaysEnum::getDays()),
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('startDate', TimeType::class, [
                'label' => 'Heure de début',
                'widget' => 'single_text',
                'required' => false,
            ])
            ->add('endDate', TimeType::class, [
                'label' => 'Heure de fin',
                'widget' => 'single_text',
                'required' => false,

            ])
            ->add('closed', CheckboxType::class, [
                'label' => 'Fermé ?',
                'required' => false,
            ])
        ;

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Hour::class,
        ]);
    }
}
