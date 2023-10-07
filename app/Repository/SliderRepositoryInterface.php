<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 9/15/20, 8:30 PM
 * Last Modified: 9/15/20, 8:30 PM
 * Project Name: Wafaq
 * File Name: SliderRepositoryInterface.php
 */
declare(strict_types=1);


namespace App\Repository;


use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface SliderRepositoryInterface
{
    public function all(): ?Collection;

    public function getDatatable(): ?Collection;

    public function createWithUploadImage(Request $request): void;

    public function updateWithUploadImage($id,Request $request): void;

    public function destroy($id): void;
}
