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
use App\Repository\BaseRepository\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\This;

class CartRepository extends BaseRepository implements CartRepositoryInterface
{
    /**
     * ItemRepository constructor.
     *
     * @param Cart $model
     */
    public function __construct(Cart $model)
    {
        parent::__construct($model);
    }

    public function getMyCart()
    {
        $user_id = auth('user')->user()->id ?? null;
        $whereData = array(array('user_id',$user_id) , array('status',0));

//        $cartItems = [];
//        foreach ($this->model->where($whereData)->orderBy('id', 'desc')->get() as $cart) {
//            if ((empty($cart->sadakat) || empty($cart->ashom)) && $cart->type != 'zakah')
//                $this->model->find($cart->id)->delete();
//            else
//                $cartItems[] = $cart;
//
//        }
        return $whereData;
    }



    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }


    public function update(int $id, Request $request): void
    {
        $this->model->find($id)->update($request->all());
    }


    public function destroy(int $id): void
    {
        $this->model->find($id)->delete();
    }


}
