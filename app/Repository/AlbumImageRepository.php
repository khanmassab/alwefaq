<?php
/*
 * Created by PhpStorm.
 * Developer: Marwa Mahmoud ( marwa.m.ebrahim@gmail.com )
 * Date: 9/15/20, 8:23 PM
 * Last Modified: 9/15/20, 8:23 PM
 * Project Name: Wafaq
 * File Name: BankTransferRepository.php
 */
declare(strict_types=1);

namespace App\Repository;

use App\Models\AlbumImage;
use App\Repository\BaseRepository\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\This;

class AlbumImageRepository extends BaseRepository implements AlbumImageRepositoryInterface
{
    /**
     * CategoryRepository constructor.
     *
     * @param AlbumImage $model
     */
    public function __construct(AlbumImage $model)
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
        return $this->model::orderBy('updated_at', 'desc')->get();
    }

    public function update(int $id, Request $request): void
    {
        $this->model->find($id)->update($request->all());
    }

    public function destroy(int $id, string $fileName): void
    {
        $this->model->where('album_image_id', $id)->where('image', $fileName)->delete();
    }

    public function createWithUploadImage(Request $request): void
    {
        $data = $request->all();
        if ($file = $request->file('file')) {
            $destinationPath = 'public/uploads/albumImages/'; // upload path
            $image = date('YmdHis') . '-' . Str::random(10) . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $image);
            $data['image'] = $image;
        }
        $this->model::create($data);
    }

    public function updateWithUploadImage(Request $request, $id): void
    {
        $albumImage = $this->model->find($id);
        $data = $request->all();
        if ($request->has('image') && $files = $request->file('image')) {
            $destinationPath = 'public/uploads/albumImages/'; // upload path
            $image = date('YmdHis') . '-' . Str::random(10) . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $image);
            $data['image'] = $image;
            File::delete(public_path(Str::replaceArray(url('/'), [''], $albumImage->image)));
        }
        $albumImage->update($data);
    }

    public function getByAlbumId($id): Collection
    {
        return $this->model->where('album_image_id', $id)->pluck('image', 'id');
    }
}
