<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 9/15/20, 12:12 PM
 * Last Modified: 9/15/20, 12:12 PM
 * Project Name: Wafaq
 * File Name: HelpRequestStatus.php
 */
declare(strict_types=1);


namespace App\Support\Enum;


final class HelpRequestStatus
{
    const NewRequest = 'newRequest';
    const Approved = 'approved';
    const Rejected = 'rejected';

    public static function lists()
    {
        return [
            self::NewRequest => trans("app.".self::NewRequest),
            self::Approved => trans("app.".self::Approved),
            self::Rejected => trans("app.".self::Rejected),
        ];
    }
}
