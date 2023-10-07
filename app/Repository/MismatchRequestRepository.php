<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 9/15/20, 8:23 PM
 * Last Modified: 9/15/20, 8:23 PM
 * Project Name: Wafaq
 * File Name: MismatchRequestRepository.php
 */
declare(strict_types=1);

namespace App\Repository;

use App\Models\Administrative;
use App\Models\MismatchRequest;
use App\Models\MarriageRequest;
use App\Repository\BaseRepository\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class MismatchRequestRepository extends BaseRepository implements MismatchRequestRepositoryInterface
{
    /**
     * MismatchRequestRepository constructor.
     *
     * @param MismatchRequest $model
     */
    public function __construct(MismatchRequest $model)
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

        return $this->model::join('marriage_requests as r','mismatch_requests.request_id','=','r.id')->join('marriage_requests as p','mismatch_requests.mismatch_request_id','=','p.id')->select('mismatch_requests.*','r.unique_id as r_unique','p.unique_id as p_unique')->orderBy('mismatch_requests.updated_at', 'desc')->get();
    }

    public function destroy($id): void
    {
        $this->model->find($id)->delete();
    }

    public function update(array $data, int $id): void
    {
        $model = $this->model->find($id);
        
        $model->update($data);
        
        // $model = MarriageRequest::find($model->request_id);
        // $model->status = 1; 
        // $model->save();
        if($data['status'] == 1){
            $model = MarriageRequest::find($model->mismatch_request_id);
            $model->status = 1; 
            $model->save();
        }else
        {
            $model = MarriageRequest::find($model->mismatch_request_id);
            $model->status = 0; 
            $model->save();
            
        }
        
    }
    
    public function createNew(Request $request): void
    {
        $model = MarriageRequest::find($request->request_id);
        $model->status = 1; 
        $model->save();
        
        $data = $request->all();
        $data['user_id'] = auth('user')->user()->id ?? null;
                
        $this->model->create($data);
        

         
    }
    
}
