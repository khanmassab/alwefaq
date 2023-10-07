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

use App\Models\Service;
use App\Repository\BaseRepository\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\This;

class ServiceRepository extends BaseRepository implements ServiceRepositoryInterface
{
    /**
     * CategoryRepository constructor.
     *
     * @param Service $model
     */
    public function __construct(Service $model)
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

    public function getSearch(Request $request)
    {

        return $this->model::select('*')->where('title', 'like', '%'.$request->keyword . '%')->orWhere('content', 'like', '%'.$request->keyword . '%')->get();
    }


    public function getDatatable(): Collection
    {
        return $this->model::orderBy('updated_at', 'desc')->get();
    }

    public function update(int $id, Request $request): void
    {
        $this->model->find($id)->update($request->all());
    }

    public function destroy(int $id): void
    {
        $this->model->find($id)->delete();
    }
    public function getParent(): ?Collection
    {
        return $this->model->where("parent","0")->orderBy('id', 'desc')->get();
    }

    public function getChild($id = 0)
    {
        return $this->model::where('id', $id)->where("parent","<>","0")->get();
    }

    /**
     * @param Request $request
     * @throws \Exception
     */
//    public function createWithSlug(Request $request): void
//    {
//        // On create
//        $slug = $this->createSlug($request->get('title'));
//
//        $this->model->create($request->all() + ['slug' => $slug]);
//    }

    /**
     * @param $title
     * @param int $id
     * @return string
     * @throws \Exception
     */
//    public function createSlug($title, $id = 0)
//    {
//        // Normalize the title
//        $slug = Str::slug($title);
//
//        // Get any that could possibly be related.
//        // This cuts the queries down by doing it once.
//        $allSlugs = $this->getRelatedSlugs($slug, $id);
//
//        // If we haven't used it before then we are all good.
//        if (!$allSlugs->contains('slug', $slug)) {
//            return $slug;
//        }
//
//        // Just append numbers like a savage until we find not used.
//        $flag = true;
//        $counter = 0;
//        while ($flag) {
//            $newSlug = $slug . '-' . $counter;
//            if (!$allSlugs->contains('slug', $newSlug)) {
//                $flag = false;
//                return $newSlug;
//            }
//            $counter++;
//        }
//
//        throw new \Exception('Can not create a unique slug');
//    }
//
//    public function createWithUploadImage(Request $request): void
//    {
//        $data = $request->all();
//
//        if ($files = $request->file('icon')) {
//            $destinationPath = 'public/uploads/services/'; // upload path
//            $image = date('YmdHis') . '-' . Str::random(10) . "." . $files->getClientOriginalExtension();
//            $files->move($destinationPath, $image);
//            $data['icon'] = $image;
//        }
//
//        $data['slug']  = $this->createSlug($data['title']);;
//
//
//        $this->model::create($data);
//    }
//
//    public function updateWithUploadImage($id, Request $request): void
//    {
//        $curriculum = $this->model->find($id);
//
//        $data = $request->all();
//
//        if ($request->has('icon') && $files = $request->file('icon')) {
//            $destinationPath = 'public/uploads/services/'; // upload path
//            $image = date('YmdHis') . '-' . Str::random(10) . "." . $files->getClientOriginalExtension();
//            $files->move($destinationPath, $image);
//            $data['icon'] = $image;
//            File::delete(public_path(Str::replaceArray(url('/'), [''], $curriculum->image)));
//        }
//
//        $data['slug']  = $this->createSlug($data['title']);;
//
//        $curriculum->update($data);
//    }
//    protected function getRelatedSlugs($slug, $id = 0)
//    {
//        return $this->model::select('slug')->where('slug', 'like', $slug . '%')
//            ->where('id', '<>', $id)
//            ->get();
//    }
//
//    public function whereSlug($slug): Service
//    {
//        return $this->model->where('slug', $slug)->firstOrFail();
//    }
}
