<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AlbumCreateRequest;
use App\Http\Requests\Backend\AlbumUpdateRequest;
use App\Repository\AlbumRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class AlbumController extends Controller
{
    /**
     * @var AlbumRepositoryInterface
     */
    private $albumRepository;

    /**
     * NewsController constructor.
     * @param AlbumRepositoryInterface $albumRepository
     */
    public function __construct(AlbumRepositoryInterface $albumRepository)
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:albums.manage');
        $this->middleware('permission:albums.add', ['only' => ['create']]);
        $this->middleware('permission:albums.edit', ['only' => ['edit']]);
        $this->middleware('permission:albums.delete', ['only' => ['destroy']]);
        $this->albumRepository = $albumRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.admin.albums.index');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getAlbums()
    {
        return DataTables::of($this->albumRepository->getDatatable())
            ->addIndexColumn()
            ->addColumn('action', function ($lessons) {
                $edit = '<a href="' . route('albums.edit', $lessons->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
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
        $edit = false;
        return view('backend.admin.albums.create-edit', compact('edit'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AlbumCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlbumCreateRequest $request)
    {
        $album = $this->albumRepository->createWithUploadImage($request);
        return redirect()->route('albums.edit', $album->id)->withSuccess(trans('app.success_created'));
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
        $album = $this->albumRepository->find($id);
        return view('backend.admin.albums.create-edit', compact('edit', 'album'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param AlbumUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlbumUpdateRequest $request, $id)
    {
        $this->albumRepository->updateWithUploadImage($id,$request);
        return redirect()->route('albums.index')->withSuccess(trans('app.success_update'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $this->albumRepository->destroy($request->id);
        return response()->json(['message' => 'success']);
    }
}
