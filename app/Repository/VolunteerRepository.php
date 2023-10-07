<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 9/15/20, 8:23 PM
 * Last Modified: 9/15/20, 8:23 PM
 * Project Name: Wafaq
 * File Name: VolunteerRepository.php
 */
declare(strict_types=1);

namespace App\Repository;

use App\Models\Volunteer;
use App\Repository\BaseRepository\BaseRepository;
use Illuminate\Support\Collection;

class VolunteerRepository extends BaseRepository implements VolunteerRepositoryInterface
{
    /**
     * VolunteerRepository constructor.
     *
     * @param Volunteer $model
     */
    public function __construct(Volunteer $model)
    {
        parent::__construct($model);
    }

    /**
     * @return Collection
     */
    public function all(): ?Collection
    {
        return $this->model->all();
    }

    public function getDatatable(): ?Collection
    {
        return $this->model->orderBy('updated_at', 'desc')->get();
    }

    public function destroy($id): void
    {
        $this->model->find($id)->delete();
    }

    public function update(array $data, int $id): void
    {
        $model = $this->model->find($id);
        $model->update($data);
    }
}
