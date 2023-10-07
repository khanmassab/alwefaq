<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 9/15/20, 8:30 PM
 * Last Modified: 9/15/20, 8:30 PM
 * Project Name: Wafaq
 * File Name: AdminRepositoryInterface.php
 */
declare(strict_types=1);


namespace App\Repository;


use Illuminate\Support\Collection;

interface AdminRepositoryInterface
{
    public function all(): Collection;

    public function getDatatable(): Collection;

    public function destroy($id): void;

    public function updateWithRole(int $id,array $data): void;

    public function createWithRole(array $data): void;
}
