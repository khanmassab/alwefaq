<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\AlbumImage;
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
     * ItemController constructor.
     * @param AlbumRepositoryInterface $albumRepository
     */
    public function __construct(AlbumRepositoryInterface $albumRepository)
    {
        $this->albumRepository = $albumRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $albums = Album::all();

        return view('frontend.mediaCenter.albums',compact('albums'));
    }

    public function albumImages($albumId)
    {
        $images = AlbumImage::where('album_image_id', $albumId)->get();

        $albums = Album::all();


        return view('frontend.mediaCenter.index',compact('images','albums'));
    }

}
