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

use App\Models\Album;
use App\Repository\BaseRepository\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\This;

class AlbumRepository extends BaseRepository implements AlbumRepositoryInterface
{
    /**
     * CategoryRepository constructor.
     *
     * @param Album $model
     */
    public function __construct(Album $model)
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

    public function createWithUploadImage(Request $request)
    {
        $data = $request->all();

        if ($files = $request->file('imageAlbum')) {
            $destinationPath = 'public/uploads/albums/'; // upload path
            $image = date('YmdHis') . '-' . Str::random(10) . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $image);
            $data['imageAlbum'] = $image;
        }



        return $this->model::create($data);

    }

    public function updateWithUploadImage($id, Request $request): void
    {
        $curriculum = $this->model->find($id);

        $data = $request->all();

        if ($request->has('imageAlbum') && $files = $request->file('imageAlbum')) {
            $destinationPath = 'public/uploads/albums/'; // upload path
            $image = date('YmdHis') . '-' . Str::random(10) . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $image);
            $data['imageAlbum'] = $image;
            File::delete(public_path(Str::replaceArray(url('/'), [''], $curriculum->image)));
        }


        $curriculum->update($data);
    }

    public function destroy(int $id): void
    {
        $this->model->find($id)->delete();
    }
}
