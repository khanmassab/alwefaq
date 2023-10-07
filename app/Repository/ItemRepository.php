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

use App\Models\Item;
use App\Repository\BaseRepository\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\This;

class ItemRepository extends BaseRepository implements ItemRepositoryInterface
{
    /**
     * ItemRepository constructor.
     *
     * @param Item $model
     */
    public function __construct(Item $model)
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

    public function createWithUploadImage(Request $request): void
    {
        $data = $request->all();

        if ($files = $request->file('image')) {
            $destinationPath = 'public/uploads/items/'; // upload path
            $image = date('YmdHis') . '-' . Str::random(10) . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $image);
            $data['image'] = $image;
        }



        $this->model::create($data);
    }

    public function update(int $id, Request $request): void
    {
        $this->model->find($id)->update($request->all());
    }

    public function updateWithUploadImage($id, Request $request): void
    {
        $curriculum = $this->model->find($id);

        $data = $request->all();
        if ($request->has('image') && $files = $request->file('image')) {

            $destinationPath = 'public/uploads/items/'; // upload path
            $image = date('YmdHis') . '-' . Str::random(10) . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $image);
            $data['image'] = $image;
            File::delete(public_path(Str::replaceArray(url('/'), [''], $curriculum->image)));
        }



        $curriculum->update($data);
    }


    public function destroy(int $id): void
    {
        $this->model->find($id)->delete();
    }
}
