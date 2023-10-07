<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ItemCreateRequest;
use App\Http\Requests\Backend\ItemUpdateRequest;
use App\Models\Item;
use App\Repository\ItemRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ItemController extends Controller
{
    /**
     * @var ItemRepositoryInterface
     */
    private $itemRepository;

    /**
     * ItemController constructor.
     * @param ITemRepositoryInterface $itemRepository
     */
    public function __construct(ItemRepositoryInterface $itemRepository)
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:items.manage');
        $this->middleware('permission:items.add', ['only' => ['create']]);
        $this->middleware('permission:items.edit', ['only' => ['edit']]);
        $this->middleware('permission:items.delete', ['only' => ['destroy']]);
        $this->itemRepository = $itemRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.admin.items.index');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getItems()
    {
        return DataTables::of($this->itemRepository->getDatatable())
            ->addIndexColumn()
            ->addColumn('action', function ($lessons) {
                $edit = '<a href="' . route('items.edit', $lessons->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
                $delete = '<button id="deleteButton" data-id="' . $lessons->id . '" type="button" class="btn btn-sm btn-danger">' . trans('app.delete') . '</button>';
                return $edit .' '. $delete;
            })
            ->addColumn('created_at', function ($lessons) {
                return $lessons->created_at->diffForHumans();
            })
            ->addColumn('updated_at', function ($lessons) {
                return $lessons->updated_at->diffForHumans();
            })
            ->rawColumns(['action', 'created_at', 'updated_at'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
//        $items = Item::all();
        $edit = false;
        return view('backend.admin.items.create-edit', compact('edit'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ItemCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemCreateRequest $request)
    {
        $this->itemRepository->createWithUploadImage($request);
        return redirect()->route('items.index')->withSuccess(trans('app.success_created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $edit = true;
        $item = $this->itemRepository->find($id);
        return view('backend.admin.items.create-edit', compact('edit', 'item'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param ItemUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ItemUpdateRequest $request, $id)
    {
        $this->itemRepository->updateWithUploadImage($id,$request);
        return redirect()->route('items.index')->withSuccess(trans('app.success_update'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $this->itemRepository->destroy($request->id);
        return response()->json(['message' => 'success']);
    }
}
