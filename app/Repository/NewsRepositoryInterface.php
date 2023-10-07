<?php
/*
 * Created by PhpStorm.
 * Developer: Marwa Mahmoud ( marwa.m.ebrahim@gmail.com )
 * Date: 9/15/20, 8:39 PM
 * Last Modified: 9/15/20, 8:39 PM
 * Project Name: Wafaq
 * File Name: TermRepositoryInterface.php
 */
declare(strict_types=1);


namespace App\Repository;


use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface NewsRepositoryInterface
{
    public function all(): Collection;

    public function getDatatable(): Collection;

    public function update(int $id, Request $request): void;

    public function destroy(int $id): void;

    public function createWithSlug(Request $request): void;

    public function whereSlug($slug): News;
}
