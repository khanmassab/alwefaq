<?php
/*
 * Created by PhpStorm.
 * Developer: Marwa Mahmoud ( marwa.m.ebrahim@gmail.com )
 * Date: 9/15/20, 8:23 PM
 * Last Modified: 9/15/20, 8:23 PM
 * Project Name: Wafaq
 * File Name: BankOrderRepository.php
 */
declare(strict_types=1);

namespace App\Repository;

use App\Models\Order;
use App\Models\OderItem;
use App\Models\Transfer;
use App\Repository\BaseRepository\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\This;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    /**
     * ItemRepository constructor.
     *
     * @param Order $model
     */
    public function __construct(Order $model)
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

    public function getMyOrders(): ?Collection
    {
        $user_id = auth('user')->user()->id ?? null;
        $whereData = array(array('user_id',$user_id));         
        return $this->model->where($whereData)->orderBy('id', 'desc')->get();
    }

    
    public function getDatatable(): Collection
    {
        return $this->model::join('users','orders.user_id','=','users.id')->select('orders.*','users.first_name','users.middle_name','users.last_name')->selectRaw('CONCAT(users.first_name, " ", users.middle_name," ", users.last_name) as full_name')->orderBy('updated_at', 'desc')->get();
    }

    public function update(int $id, Request $request): void
    {
        $this->model->find($id)->update($request->all());
    }


    public function destroy(int $id): void
    {
        $this->model->find($id)->delete();
    }

    public function createOrder(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = auth('user')->user()->id ?? null;
        
        return $this->model->create($data);
        
    }

}
