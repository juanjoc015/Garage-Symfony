<?php

namespace App\Enum;

class DaysEnum 
{
    public const MONDAY = 'lundi';
    public const TUESDAY = 'mardi';
    public const WEDNESDAY = 'mercredi';
    public const THURSDAY = 'jeudi';
    public const FRIDAY = 'vendredi';
    public const SATURDAY = 'samedi';
    public const SUNDAY = 'dimanche';

    public static function getDays(): array
    {
        return [
            self::MONDAY => 'Lundi',
            self::TUESDAY => 'Mardi',
            self::WEDNESDAY => 'Mercredi',
            self::THURSDAY => 'Jeudi',
            self::FRIDAY => 'Vendredi',
            self::SATURDAY => 'Samedi',
            self::SUNDAY => 'Dimanche',
        ];
    }

    public static function getName(string $day): string
    {
        if(!in_array($day, array_keys(self::getDays()) )) {
            return  $day . ' inconnu';
        }

        return self::getDays()[$day];
    }
}