<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 9/15/20, 8:23 PM
 * Last Modified: 9/15/20, 8:23 PM
 * Project Name: Wafaq
 * File Name: JobApplicationRepository.php
 */
declare(strict_types=1);

namespace App\Repository;

use App\Models\JobApplication;
use App\Repository\BaseRepository\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class JobApplicationRepository extends BaseRepository implements JobApplicationRepositoryInterface
{
    /**
     * JobApplicationRepository constructor.
     *
     * @param JobApplication $model
     */
    public function __construct(JobApplication $model)
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

    public function getDatatableByJobId($id): ?Collection
    {
        return $this->model->where('job_id', $id)->orderBy('updated_at', 'desc')->get();
    }

    public function createWithUploadCV($request)
    {
        $data = $request->all();

        if ($files = $request->file('cv')) {
            $destinationPath = 'public/uploads/jobApplications/'; // upload path
            $cv = date('YmdHis') . '-' . Str::random(10) . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $cv);
            $data['cv'] = $cv;



        }


        $this->model::create($data);
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

    public function currentUserApplications(): ?Collection
    {
        return $this->model->where('user_id',auth()->user()->id());
    }
}
