<?php

namespace App\Enum;
// PORQUE NO FUNCIONA
class UserRoleEnum 
{
    public const ROLE_USER = 'ROLE_USER';
    public const ROLE_CARS = 'ROLE_CARS';
    public const ROLE_ADMIN = 'ROLE_ADMIN';

    public static function getRoles(): array
    {
        return [
            self::ROLE_USER => 'Utilisateur',
            self::ROLE_CARS => 'Gestionnaire',
            self::ROLE_ADMIN => 'Administrateur',
        ];
    }

    public static function getName(string $role): string
    {
        if(!in_array($role, array_keys(self::getRoles()) )) {
            return  $role . ' inconnu';
        }

        return self::getRoles()[$role];
    }
}