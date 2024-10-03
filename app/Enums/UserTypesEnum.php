<?php

namespace App\Enums;


final class UserTypesEnum
{
    const ADMIN = 'admin';
    const USER = 'user';
    const INDIVIDUAL_SERVICE_PROVIDER = 'individual_provider';
    const COMPANY_SERVICE_PROVIDER = 'company_provider';

    public static function getTypes()
    {
        return [
            self::ADMIN,
            self::USER,
            self::INDIVIDUAL_SERVICE_PROVIDER,
            self::COMPANY_SERVICE_PROVIDER
        ];
    }

}
