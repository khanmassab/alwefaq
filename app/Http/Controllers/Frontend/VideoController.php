<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Video;
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
     * ItemController constructor.
     * @param VideoRepositoryInterface $videoRepository
     */
    public function __construct(VideoRepositoryInterface $videoRepository)
    {
        $this->videoRepository = $videoRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $videos = Video::all();

        return view('frontend.videos.index',compact('videos'));
    }

    public function showSingleVideo($id, $name)
    {

        $video = $this->videoRepository->find($id);

        return view('frontend.videos.show', compact('video'));

    }

}
