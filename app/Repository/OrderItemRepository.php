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

use App\Models\Cart;
use App\Models\OrderItem;
use App\Repository\BaseRepository\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\This;

class OrderItemRepository extends BaseRepository implements OrderItemRepositoryInterface
{
    /**
     * ItemRepository constructor.
     *
     * @param OrderItem $model
     */
    public function __construct(OrderItem $model)
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

    public function getOrderItems($id): ?Collection
    {
        return $this->model->where('order_id',$id)->orderBy('id', 'desc')->get();
    }



    public function update(int $id, Request $request): void
    {
        $this->model->find($id)->update($request->all());
    }

    public function getRemainAshom($id)
    {
        $whereData = array(array('type','ashom') , array('item_id',$id));
        $sum =  $this->model->where($whereData)->join('orders','order_items.order_id','=','orders.id')->select('order_items.*','order.status')->sum('order_items.quantity');
        return $sum;
    }

    public function createOrderItems($id)
    {
        $user_id = auth('user')->user()->id ?? null;
        $whereData = array(array('user_id',$user_id) , array('status',0));
        $cartItems = Cart::where($whereData)->orderBy('id', 'desc')->get();
        if(count($cartItems) > 0){
            foreach($cartItems as $item)
            {
                $orderItem = new OrderItem();
                $orderItem->type = $item->type;

                if($item->type == "sadakat")
                {
                    $orderItem->price = $item->sadakat->price;
                    $orderItem->item_name = $item->sadakat->name;
                }
                if($item->type == "ashom")
                {
                    $orderItem->price = $item->ashom->price;
                    $orderItem->item_name = $item->ashom->name;

                }
                if($item->type == "zakah")
                {
                    $orderItem->price = $item->price;
                    $orderItem->item_name = 'الزكاة';
                }

                $orderItem->order_id = $id;

                $orderItem->quantity = $item->quantity;
                $orderItem->item_id = $item->item_id;
                $orderItem->save();

            }
        }
        Cart::where($whereData)->update(['status' => 1]);


    }


    public function destroy(int $id): void
    {
        $this->model->find($id)->delete();
    }


}
