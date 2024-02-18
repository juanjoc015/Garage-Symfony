<?php

namespace App\Form;

use App\Entity\User;
use App\Enum\UserRoleEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('email', EmailType::class, [
            'label' => 'Email',
        ])
        ->add('roles', ChoiceType::class, [
            'label' => 'Rôles',
            'choices' => $this->getRoles($options['roles']),
            'multiple' => true,
            'expanded' => true,
        ])
        ->add('confirmPassword', RepeatedType::class, [
            'type' => PasswordType::class,
            'invalid_message' => 'Les mots de passe doivent correspondre.',
            'first_options'  => ['label' => 'Mot de passe'],
            'second_options' => ['label' => 'Répéter le mot de passe'],
            'required' => false,
            'mapped' => false,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'roles' => [],
        ]);
    }

    private function getRoles(array $roles): array
    {
        $roles = array_keys($roles);

        $values = array_map(function($key) {
            return UserRoleEnum::getName($key);
        }, $roles);

        return array_combine($values, $roles);
    }
}
