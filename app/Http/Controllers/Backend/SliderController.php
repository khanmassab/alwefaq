<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\SliderCreateRequest;
use App\Http\Requests\Backend\SliderUpdateRequest;
use App\Repository\SliderRepositoryInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SliderController extends Controller
{
    /**
     * @var SliderRepositoryInterface
     */
    private $sliderRepository;

    /**
     * CurriculumController constructor.
     * @param SliderRepositoryInterface $sliderRepository
     */
    public function __construct(SliderRepositoryInterface $sliderRepository)
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:sliders.manage');
        $this->middleware('permission:sliders.add', ['only' => ['create']]);
        $this->middleware('permission:sliders.edit', ['only' => ['edit']]);
        $this->middleware('permission:sliders.delete', ['only' => ['destroy']]);
        $this->sliderRepository = $sliderRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.admin.slider.index');
    }

    public function getSliders()
    {
        return DataTables::of($this->sliderRepository->getDatatable())
            ->addIndexColumn()
            ->addColumn('action', function ($curriculum) {
                $edit = '<a href="' . route('sliders.edit', $curriculum->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
                $delete = '<button id="deleteButton" data-id="' . $curriculum->id . '" type="button" class="btn btn-sm btn-danger">' . trans('app.delete') . '</button>';
                return $edit . ' ' . $delete;
            })
            ->addColumn('image', function ($curriculum) {
                return "<img style='max-height: 30px; max-width: 60px;' src='{$curriculum->image}'/>";
            })
            ->addColumn('created_at', function ($curriculum) {
                return $curriculum->created_at->diffForHumans();
            })
            ->addColumn('updated_at', function ($curriculum) {
                return $curriculum->updated_at->diffForHumans();
            })
            ->rawColumns(['action', 'created_at', 'updated_at', 'image'])
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
        return view('backend.admin.slider.create-edit', compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SliderCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderCreateRequest $request)
    {
        $this->sliderRepository->createWithUploadImage($request);
        return redirect()->route('sliders.index')->withSuccess(trans('app.success_created'));
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
        $slider = $this->sliderRepository->find($id);
        return view('backend.admin.slider.create-edit', compact('edit', 'slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SliderUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderUpdateRequest $request, $id)
    {
        $this->sliderRepository->updateWithUploadImage($id, $request);
        return redirect()->route('sliders.index')->withSuccess(trans('app.success_created'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->sliderRepository->destroy($request->id);
        return response()->json(['message' => 'success']);
    }
}
