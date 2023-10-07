<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 9/15/20, 8:23 PM
 * Last Modified: 9/15/20, 8:23 PM
 * Project Name: Wafaq
 * File Name: SystemRepository.php
 */
declare(strict_types=1);

namespace App\Repository;

//use App\Models\System;
use App\Models\System;
use App\Repository\BaseRepository\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SystemRepository extends BaseRepository implements SystemRepositoryInterface
{
    /**
     * CategoryRepository constructor.
     *
     * @param System $model
     */
    public function __construct(System $model)
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
    public function getParent(): ?Collection
    {
        return $this->model->where("parent","0")->orderBy('id', 'desc')->get();
    }

    public function getChild($id = 0)
    {
        return $this->model::where('id', $id)->where("parent","<>","0")->get();
    }
    

//    public function createWithUploadImage(Request $request): void
//    {
//        $data = $request->all();
//
//        if ($files = $request->file('image')) {
//            $destinationPath = 'public/uploads/systems/'; // upload path
//            $image = date('YmdHis') . '-' . Str::random(10) . "." . $files->getClientOriginalExtension();
//            $files->move($destinationPath, $image);
//            $data['image'] = $image;
//        }
//
//        $this->model::create($data);
//    }

//    public function updateWithUploadImage($id, Request $request): void
//    {
//        $curriculum = $this->model->find($id);
//
//        $data = $request->all();
//
//        if ($request->has('image') && $files = $request->file('image')) {
//            $destinationPath = 'public/uploads/systems/'; // upload path
//            $image = date('YmdHis') . '-' . Str::random(10) . "." . $files->getClientOriginalExtension();
//            $files->move($destinationPath, $image);
//            $data['image'] = $image;
//            File::delete(public_path(Str::replaceArray(url('/'), [''], $curriculum->image)));
//        }
//        $curriculum->update($data);
//    }

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
