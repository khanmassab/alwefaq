<?php declare(strict_types=1);

namespace App\Repository;

use App\Models\Transfer;
use App\Repository\BaseRepository\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\This;

class TransferRepository extends BaseRepository implements TransferRepositoryInterface
{
    /**
     * ItemRepository constructor.
     *
     * @param Transfer $model
     */
    public function __construct(Transfer $model)
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


    public function update(int $id, Request $request): void
    {
        $this->model->find($id)->update($request->all());
    }


    public function destroy(int $id): void
    {
        $this->model->find($id)->delete();
    }
    
    public function getOrderTransfer($id) 
    {
        $data =  $this->model->where('order_id',$id)->latest('id')->first();
        return $data;
    }

    public function createTransfer(Request $request,$id): void
    {
        $data = $request->all();
        $transfer_image = '';
        if ($files = $request->file('transfer_image')) {
            $destinationPath = 'public/uploads/transfers/'; // upload path
            $image = date('YmdHis') . '-' . Str::random(10) . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $image);
            $transfer_image = $image;
        }

        $transfer = new Transfer();
        $transfer->transfer_image = $transfer_image;
        $transfer->order_id = $id;
        $transfer->save();

    }

}
