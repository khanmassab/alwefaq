<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Repository\ServiceRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
{
    /**
     * @var ServiceRepositoryInterface
     */
    private $serviceRepository;

    /**
     * ItemController constructor.
     * @param ServiceRepositoryInterface $serviceRepository
     */
    public function __construct(ServiceRepositoryInterface $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $services = Service::all();
        return view('frontend.services.index',compact('services'));
    }

    public function show($id)
    {

        $service = $this->serviceRepository->find($id);

        return view('frontend.services.show', compact('service'));

    }

//    public function showSingleService($id, $name)
//    {
//
//        $service = $this->serviceRepository->find($id);
//
//        return view('frontend.services.show', compact('service'));
//
//    }



}
