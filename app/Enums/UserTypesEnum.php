<?php

namespace App\Enums;


final class UserTypesEnum
{
    const ADMIN = 'admin';
    const USER = 'user';

    public static function getTypes()
    {
        return [
            self::ADMIN,
            self::USER,
        ];
    }

}
