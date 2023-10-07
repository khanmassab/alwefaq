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

use App\Models\Setting;
use App\Repository\BaseRepository\BaseRepository;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\This;


class SettingRepository extends BaseRepository implements SettingRepositoryInterface
{
    /**
     * CategoryRepository constructor.
     *
     * @param Setting $model
     */
    public function __construct(Setting $model)
    {
        parent::__construct($model);
    }
    
    public function createWithUploadImage(Request $request,$id): void
    {
        $data = $request->all();
        if ($file = $request->file('image1')) {
            $destinationPath = 'public/uploads/setting/'; // upload path
            $image = date('YmdHis') . '-' . Str::random(10) . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $image);
            $data['image1'] = $image;
        }
        if ($file = $request->file('image2')) {
            $destinationPath = 'public/uploads/setting/'; // upload path
            $image = date('YmdHis') . '-' . Str::random(10) . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $image);
            $data['image2'] = $image;
        }
        
        $this->model->find($id)->update($data);
    }

    public function deleteImage($id): void
    {
        if ($id == 1) {
            $data['image1'] = '';
        }
        if ($id == 2) {
            $data['image2'] = '';
        }
        
        $this->model->find(1)->update($data);
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
        // TODO: Implement getDatatable() method.
    }

}
