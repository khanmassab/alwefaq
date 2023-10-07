<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 9/15/20, 8:23 PM
 * Last Modified: 9/15/20, 8:23 PM
 * Project Name: Wafaq
 * File Name: AboutRepository.php
 */
declare(strict_types=1);

namespace App\Repository;

use App\Models\About;
use App\Repository\BaseRepository\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AboutRepository extends BaseRepository implements AboutRepositoryInterface
{
    /**
     * CategoryRepository constructor.
     *
     * @param About $model
     */
    public function __construct(About $model)
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
    public function getParent(): ?Collection
    {
        return $this->model->where("parent","0")->orderBy('id', 'desc')->get();
    }

    public function getChild($id = 0)
    {
        return $this->model::where('id', $id)->where("parent","<>","0")->get();
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
