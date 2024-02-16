<?php

namespace App\Enum;

class CarsBrandEnum 
{
    public const BRAND_VOLKSWAGEN = 'Volkswagen';
    public const BRAND_AUDI = 'Audi';
    public const BRAND_BMW = 'BMW';
    public const BRAND_MERCEDES = 'Mercedes';
    public const BRAND_FORD = 'Ford';
    public const BRAND_TOYOTA = 'Toyota';
    public const BRAND_NISSAN = 'Nissan';
    public const BRAND_KIA = 'Kia';
    public const BRAND_HYUNDAI = 'Hyundai';
    public const BRAND_MAZDA = 'Mazda';
    public const BRAND_MINI = 'Mini';
    public const BRAND_VOLVO = 'Volvo';
    public const BRAND_SKODA = 'Skoda';
    public const BRAND_SEAT = 'Seat';
    public const BRAND_OPEL = 'Opel';
    public const BRAND_CITROEN = 'Citroën';
    public const BRAND_DACIA = 'Dacia';
    public const BRAND_PEUGEOT = 'Peugeot';
    public const BRAND_RENAULT = 'Renault';
    public const BRAND_FIAT = 'Fiat';

    public static function getBrands(): array
    {
        return [
            self::BRAND_VOLKSWAGEN => 'Volkswagen',
            self::BRAND_AUDI => 'Audi',
            self::BRAND_BMW => 'BMW',
            self::BRAND_MERCEDES => 'Mercedes',
            self::BRAND_FORD => 'Ford',
            self::BRAND_TOYOTA => 'Toyota',
            self::BRAND_NISSAN => 'Nissan',
            self::BRAND_KIA => 'Kia',
            self::BRAND_HYUNDAI => 'Hyundai',
            self::BRAND_MAZDA => 'Mazda',
            self::BRAND_MINI => 'Mini',
            self::BRAND_VOLVO => 'Volvo',
            self::BRAND_SKODA => 'Skoda',
            self::BRAND_SEAT => 'Seat',
            self::BRAND_OPEL => 'Opel',
            self::BRAND_CITROEN => 'Citroën',
            self::BRAND_DACIA => 'Dacia',
            self::BRAND_PEUGEOT => 'Peugeot',
            self::BRAND_RENAULT => 'Renault',
            self::BRAND_FIAT => 'Fiat',
        ];
    }

    public static function getName(string $role): string
    {
        if(!in_array($role, array_keys(self::getBrands()) )) {
            return  $role . ' inconnu';
        }

        return self::getBrands()[$role];
    }
}