<?php

namespace App\Form;

use App\Entity\Car;
use App\Enum\CarsBrandEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('brand', ChoiceType::class, [
                'label' => 'Marque',
                'choices' => CarsBrandEnum::getBrands(),
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('name', TextType::class, [
                'label' => 'Nom'
            ])
            ->add('year', TextType::class, [
                'label' => 'Année'
            ] )
            ->add('mileage', TextType::class, [
                'label' => 'Kilométrage'
            ])
            ->add('price', NumberType::class, [
                'label' => 'Prix'
            ])
            ->add('image', TextType::class, [
                'label' => 'Image'
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}
