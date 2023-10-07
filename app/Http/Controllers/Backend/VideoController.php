<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\VideoCreateRequest;
use App\Http\Requests\Backend\VideoUpdateRequest;
use App\Repository\VideoRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class VideoController extends Controller
{
    /**
     * @var VideoRepositoryInterface
     */
    private $videoRepository;

    /**
     * NewsController constructor.
     * @param VideoRepositoryInterface $videoRepository
     */
    public function __construct(VideoRepositoryInterface $videoRepository)
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:videos.manage');
        $this->middleware('permission:videos.add', ['only' => ['create']]);
        $this->middleware('permission:videos.edit', ['only' => ['edit']]);
        $this->middleware('permission:videos.delete', ['only' => ['destroy']]);
        $this->videoRepository = $videoRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.admin.video.index');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getVideos()
    {
        return DataTables::of($this->videoRepository->getDatatable())
            ->addIndexColumn()
            ->addColumn('action', function ($lessons) {
                $edit = '<a href="' . route('videos.edit', $lessons->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
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
        return view('backend.admin.video.create-edit', compact('edit'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param VideoCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoCreateRequest $request)
    {
        $this->videoRepository->createWithUploadVideo($request);

        return redirect()->route('videos.index')->withSuccess(trans('app.success_created'));
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

        $video = $this->videoRepository->find($id);

        return view('backend.admin.video.create-edit', compact('edit', 'video'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param VideoUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(VideoUpdateRequest $request, $id)
    {
        $this->videoRepository->updateWithUploadVideo($id, $request);
        return redirect()->route('videos.index')->withSuccess(trans('app.success_update'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $this->videoRepository->destroy($request->id);
        return response()->json(['message' => 'success']);
    }
}
