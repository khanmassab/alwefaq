<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 9/15/20, 8:23 PM
 * Last Modified: 9/15/20, 8:23 PM
 * Project Name: Wafaq
 * File Name: ContactusRepository.php
 */
declare(strict_types=1);

namespace App\Repository;

use App\Models\ContactU;
use App\Repository\BaseRepository\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ContactusRepository extends BaseRepository implements ContactusRepositoryInterface
{
    /**
     * CategoryRepository constructor.
     *
     * @param ContactU $model
     */
    public function __construct(ContactU $model)
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
        return $this->model->orderBy('updated_at', 'desc')->get();
    }

    public function createContact(Request $request): void
    {
        $data = $request->all();
        $data['user_id'] = auth('user')->user()->id ?? null;
        $this->model->create($data);
    }
    public function createWithStudent(Request $request): void
    {
        $data = $request->all();
        $data['user_id'] = auth('user')->user()->id ?? null;
        $this->model->create($data);
    }
    public function destroy(int $id): void
    {
        $this->model->find($id)->delete();
    }

}
