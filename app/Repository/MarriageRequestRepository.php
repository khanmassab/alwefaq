<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 9/15/20, 8:23 PM
 * Last Modified: 9/15/20, 8:23 PM
 * Project Name: Wafaq
 * File Name: MarriageRequestRepository.php
 */
declare(strict_types=1);

namespace App\Repository;

use App\Models\Administrative;
use App\Models\MarriageRequest;
use App\Models\MismatchRequest;

use App\Repository\BaseRepository\BaseRepository;
use Illuminate\Http\Request;
use AppHelper;
use Auth;
use Illuminate\Support\Collection;

class MarriageRequestRepository extends BaseRepository implements MarriageRequestRepositoryInterface
{
    /**
     * MarriageRequestRepository constructor.
     *
     * @param MarriageRequest $model
     */
    public function __construct(MarriageRequest $model)
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

    public function getPartnerRequest(): ?Int
    {
        $user = auth('user')->user() ?? null;
        $whereData = array(array('user_id',$user->id) , array('request_type',2));
        $data =  $this->model->where($whereData)->latest('id')->first();
        return $data->id;
    }
    public function getPartnerRequestOptions(): ?String
    {
        $user = auth('user')->user() ?? null;
        $whereData = array(array('user_id',$user->id) , array('request_type',2));
        $data =  $this->model->where($whereData)->latest('id')->first();
        return $data->options;
    }
    public function getMarriageRequest(): ?Int
    {
        $user = auth('user')->user() ?? null;
        $whereData = array(array('user_id',$user->id) , array('request_type',1));
        $data =  $this->model->where($whereData)->latest('id')->first();
        return $data->id;
    }
    public function getMyRequests(): ?Collection
    {
        $user_id = auth('user')->user()->id ?? null;
        $whereData = array(array('user_id',$user_id) , array('request_type',2));
        return $this->model->where($whereData)->orderBy('id', 'desc')->get();
    }
    public function checkPartnerRequest(): ?bool
    {
        $check = false;
        $user = auth('user')->user() ?? null;
        $whereData = array(array('user_id',$user->id) , array('request_type',2));
        $data =  $this->model->where($whereData)->latest('id')->first();
        if(!empty($data) && $data != null)
        {
            $check = true;
        }
        return $check;
    }
    public function checkMarriageRequest(): ?bool
    {
        $check = false;
        $user = auth('user')->user() ?? null;
        $whereData = array(array('user_id',$user->id) , array('request_type',1));
        $data =  $this->model->where($whereData)->latest('id')->first();
        if(!empty($data) && $data != null )
        {
            $check = true;
        }
        return $check;
    }

    public function getSuggests(): ?Collection
    {
        $user = auth('user')->user() ?? null;
        
        $request_options = $this->getPartnerRequestOptions();
        $options = array();
        if(!empty($request_options) && $request_options != '' &&  $request_options != null)
        {
            $options = explode(",",$request_options);
        }
        

        
        
        $sort_array = array();
        $order = 'desc';
        $whereData = array(array('user_id',$user->id) , array('request_type',2));
        $data =  $this->model->where($whereData)->latest('id')->first();
        
        $mismatch_array = array();
        
        $mismatchs = MismatchRequest::where('request_id',$data['id'])->get();
        
        
        if($mismatchs != null && count($mismatchs) > 0 )
        {
            foreach($mismatchs as $mis)
            {
                $mismatch_array[] = $mis['mismatch_request_id'];
            }
        }
        
        $model = $this->model->join('users','marriage_requests.user_id','=','users.id')->select('marriage_requests.*','users.gender');
        $model->where('request_type',1)->where('user_id','!=',$user->id)->where('users.gender','!=',$user->gender)->where('marriage_requests.status',0)->whereNotIn('marriage_requests.id', $mismatch_array);



        if($data->nationality_id != '' && $data->nationality_id != null && !empty($data->nationality_id) && in_array("الجنسية",$options) )
        {
            $model->where('nationality_id',$data->nationality_id);
            $sort_array['nationality_id'] = $order;
        }

        if($data->qualification_id != '' && $data->qualification_id != null && !empty($data->qualification_id) && in_array("المؤهل التعليمى",$options))
        {
         $model->where('qualification_id',$data->qualification_id);
            $sort_array['qualification_id'] = $order;

        }

        if($data->city_id != '' && $data->city_id != null && !empty($data->city_id) && in_array("مكان الاقامة",$options) )
        {
         $model->where('city_id',$data->city_id);
            $sort_array['city_id'] = $order;

        }

        if($data->tripe != '' && $data->tripe != null && !empty($data->tripe) && in_array("القبلية",$options) )
        {
         $model->where('tripe',$data->tripe);
                $sort_array['tripe'] = $order;

        }

        if($data->hair != '' && $data->hair != null && !empty($data->hair) && in_array("الشعر",$options) )
        {
         $model->where('hair',$data->hair);
                $sort_array['hair'] = $order;

        }

        if($data->religion != '' && $data->religion != null && !empty($data->religion) && in_array("التدين",$options) )
        {
         $model->where('religion',$data->religion);
        $sort_array['religion'] = $order;

        }
        if($data->beared != '' && $data->beared != null && !empty($data->beared) && in_array("اللحية",$options)  )
        {
         $model->where('beared',$data->beared);
                    $sort_array['beared'] = $order;

        }
        if($data->shape != '' && $data->shape != null && !empty($data->shape) && in_array("الشكل",$options)  )
        {
         $model->where('shape',$data->shape);
                        $sort_array['shape'] = $order;


        }
        if($data->smoked != '' && $data->smoked != null && !empty($data->smoked) && in_array("التدخين",$options)  )
        {
         $model->where('smoked',$data->smoked);
                        $sort_array['smoked'] = $order;

        }
        
        if($data->weight != '' && $data->weight != null && !empty($data->weight)  && in_array("الوزن",$options))
        {
         $model->where('weight',$data->weight);
                            $sort_array['weight'] = $order;

        }
        if($data->height != '' && $data->height != null && !empty($data->height) &&  in_array("الطول",$options))
        {
                     $model->where('height',$data->height);
                            $sort_array['height'] = $order;

        }
       
       
        if($data->skin_color != '' && $data->skin_color != null && !empty($data->skin_color) && in_array("لون البشرة",$options)  )
        {
         $model->where('skin_color',$data->skin_color);
                                $sort_array['skin_color'] = $order;

        }
        if($data->health_status != '' && $data->health_status != null && !empty($data->health_status) && in_array("الحالة الصحية",$options)  )
        {
         $model->where('health_status',$data->health_status);
                                    $sort_array['health_status'] = $order;

        }
        if($data->social_status != '' && $data->social_status != null && !empty($data->social_status) && in_array("الحالة الاجتماعية",$options)  )
        {
         $model->where('social_status',$data->social_status);
                                        $sort_array['social_status'] = $order;

        }
        if($data->financial_status != '' && $data->financial_status != null && !empty($data->financial_status) && in_array("الحالة المادية",$options) )
        {
         $model->where('financial_status',$data->financial_status);
                                                    $object['financial_status'] = $order;
            array_push($object,$sort_array);

        }
        if($data->job_type != '' && $data->job_type != null && !empty($data->job_type)  && in_array("نوع الوظيفة",$options))
        {
         $model->where('job_type',$data->job_type);
            $object['job_type'] = $order;
            array_push($object,$sort_array);

        }
        if($data->monthly_income != '' && $data->monthly_income != null && !empty($data->monthly_income) && in_array("الدخل الشهرى",$options)  )
        {
         $model->where('monthly_income',$data->monthly_income);
                                                                    $sort_array['monthly_income'] = $order;

        }
        if($data->face_cover != '' && $data->face_cover != null && !empty($data->face_cover) && in_array("غطاء الوجة",$options)  )
        {
         $model->where('face_cover',$data->face_cover);
            $sort_array['face_cover'] = $order;

        }
        if($data->head_cover != '' && $data->head_cover != null && !empty($data->head_cover) && in_array("عباءة الرأس",$options)  )
        {
         $model->where('head_cover',$data->head_cover);
                $sort_array['head_cover'] = $order;

        }
        if($data->body_cover != '' && $data->body_cover != null && !empty($data->body_cover) && in_array("النقاب",$options)  )
        {
         $model->where('body_cover',$data->body_cover);
            $sort_array['body_cover'] = $order;

        }
        if($data->age != '' && $data->age != null && !empty($data->age) && in_array("العمر",$options)  )
        {
         $age =  preg_replace('/\s+/', '', $data->age);
         $array = explode('-', $age);

         $model->whereBetween('age', [$array[1], $array[0]]);
            $sort_array['age'] = $order;

        }
        foreach ($sort_array as $key => $value) {
            $model->orderBy($key, $value);
        }
        // dd($model);
        return $model->limit(3)->get();
    }

    public function getDatatable(): ?Collection
    {
        return $this->model::join('users','marriage_requests.user_id','=','users.id')->select('marriage_requests.*','users.first_name','users.middle_name','users.last_name')->selectRaw('CONCAT(users.first_name, " ", users.middle_name," ", users.last_name) as full_name')->where('request_type','1')->orderBy('updated_at', 'desc')->get();
    }
    public function getDatatable2(): ?Collection
    {
        return $this->model::join('users','marriage_requests.user_id','=','users.id')->select('marriage_requests.*','users.first_name','users.middle_name','users.last_name')->selectRaw('CONCAT(users.first_name, " ", users.middle_name," ", users.last_name) as full_name')->where('request_type','2')->orderBy('updated_at', 'desc')->get();
    }


    public function destroy($id): void
    {
        $this->model->find($id)->delete();
    }

    public function update(array $data, int $id): void
    {
        $model = $this->model->find($id);

        if(isset($data['options']) && $data['options'] != null && count($data['options'])  > 0)
        {
           $data['options'] = implode(",",$data['options']); 
        }
        
        
        $model->update($data);
    }
    public function createNew(Request $request): void
    {
        $data = $request->all();
        $user_birthday = Auth::user()->birthday->format('d-m-Y');
        $current_year = date('Y');
        $random = rand(pow(10, 3-1), pow(10, 3)-1);
        $user_age = floor((time() - strtotime($user_birthday)) / 31556926);
        $birthDate = $data['birthday'] ?? null;
        $data['user_id'] = auth('user')->user()->id ?? null;
        $data['unique_id'] = '0'.$user_age.$current_year.$random;
        
        if(isset($data['options']) && $data['options'] != null && count($data['options'])  > 0)
        {
           $data['options'] = implode(",",$data['options']); 
        }

        if($birthDate != null && $birthDate != '')
        {

            $age = floor((time() - strtotime($user_birthday)) / 31556926);
            $data['age'] = $age;

        }


        $this->model->create($data);

    }

}
