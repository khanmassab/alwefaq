<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AlbumImage;
use App\Repository\AlbumImageRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class AlbumImageController extends Controller
{
    /**
     * @var AlbumImageRepositoryInterface
     */
    private $albumImageRepository;

    /**
     * ItemController constructor.
     * @param AlbumImageRepositoryInterface $albumImageRepository
     */
    public function __construct(AlbumImageRepositoryInterface $albumImageRepository)
    {
        $this->albumImageRepository = $albumImageRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index($id)
    {
        $albumImages = AlbumImage::where('album_id',$id);

        return view('frontend.albumImages.index',compact('albumImages'));
    }


}
