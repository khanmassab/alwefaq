<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AlbumImageCreateRequest;
use App\Repository\AlbumImageRepositoryInterface;
use Illuminate\Http\Request;

class AlbumImageController extends Controller
{
    /**
     * @var AlbumImageRepositoryInterface
     */
    private $albumImageRepository;

    /**
     * NewsController constructor.
     * @param AlbumImageRepositoryInterface $albumImageRepository
     */
    public function __construct(AlbumImageRepositoryInterface $albumImageRepository)
    {
        $this->albumImageRepository = $albumImageRepository;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getAlbumImages($id)
    {
        return $this->albumImageRepository->getByAlbumId($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AlbumImageCreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeImage(Request $request)
    {
        $this->albumImageRepository->createWithUploadImage($request);
        return response()->json(['message' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteImage(Request $request)
    {
        $this->albumImageRepository->destroy($request->get('album_id'), $request->get('filename'));
        return response()->json(['message' => 'success']);
    }
}
