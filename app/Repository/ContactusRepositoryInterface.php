<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 9/15/20, 8:39 PM
 * Last Modified: 9/15/20, 8:39 PM
 * Project Name: Wafaq
 * File Name: TermRepositoryInterface.php
 */
declare(strict_types=1);


namespace App\Repository;


use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface ContactusRepositoryInterface
{
    public function all(): Collection;

    public function getDatatable(): Collection;

    public function createWithStudent(Request $request): void;
}
