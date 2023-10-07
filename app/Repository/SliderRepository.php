<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 9/15/20, 8:23 PM
 * Last Modified: 9/15/20, 8:23 PM
 * Project Name: Wafaq
 * File Name: SliderRepository.php
 */
declare(strict_types=1);

namespace App\Repository;

use App\Models\Slider;
use App\Repository\BaseRepository\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SliderRepository extends BaseRepository implements SliderRepositoryInterface
{
    /**
     * CategoryRepository constructor.
     *
     * @param Slider $model
     */
    public function __construct(Slider $model)
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

    public function createWithUploadImage(Request $request): void
    {
        $data = $request->all();

        if ($files = $request->file('image')) {
            $destinationPath = 'public/uploads/sliders/'; // upload path
            $image = date('YmdHis') . '-' . Str::random(10) . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $image);
            $data['image'] = $image;
        }

        $this->model::create($data);
    }

    public function updateWithUploadImage($id, Request $request): void
    {
        $curriculum = $this->model->find($id);

        $data = $request->all();

        if ($request->has('image') && $files = $request->file('image')) {
            $destinationPath = 'public/uploads/sliders/'; // upload path
            $image = date('YmdHis') . '-' . Str::random(10) . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $image);
            $data['image'] = $image;
            File::delete(public_path(Str::replaceArray(url('/'), [''], $curriculum->image)));
        }
        $curriculum->update($data);
    }

    public function destroy($id): void
    {
        $this->model->find($id)->delete();
    }

}
