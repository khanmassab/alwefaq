<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 9/15/20, 8:34 PM
 * Last Modified: 9/15/20, 8:34 PM
 * Project Name: Wafaq
 * File Name: SettingRepositoryInterface.php
 */
declare(strict_types=1);


namespace App\Repository;


use Illuminate\Support\Collection;

interface SettingRepositoryInterface
{
    public function all(): Collection;

    public function getDatatable(): Collection;
}
