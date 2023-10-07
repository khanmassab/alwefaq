<?php

declare(strict_types=1);


namespace App\Repository;


use App\Models\Transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface TransferRepositoryInterface
{
    public function all(): Collection;

    public function update(int $id, Request $request): void;

    public function destroy(int $id): void;
}
