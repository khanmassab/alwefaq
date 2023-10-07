<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 9/15/20, 8:23 PM
 * Last Modified: 9/15/20, 8:23 PM
 * Project Name: Wafaq
 * File Name: CategoryRepository.php
 */
declare(strict_types=1);

namespace App\Repository;

use App\Models\Admin;
use App\Repository\BaseRepository\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use phpDocumentor\Reflection\Types\This;

class AdminRepository extends BaseRepository implements AdminRepositoryInterface
{
    /**
     * CategoryRepository constructor.
     *
     * @param Admin $model
     */
    public function __construct(Admin $model)
    {
        parent::__construct($model);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    public function getDatatable(): Collection
    {
        return $this->model->where('id','!=',auth()->id())->orderBy('updated_at', 'desc')->get();
    }

    public function createWithRole(array $data): void
    {
        $admin = $this->model::create($data);
        $admin->assignRole($data['role']);
    }

    public function updateWithRole(int $id,array $data): void
    {
        $admin = $this->model->find($id);
        $admin->update($data);
        $admin->assignRole($data['role']);
    }

    public function destroy($id): void
    {
        $this->model->find($id)->delete();
    }
}
