<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\System;
use App\Repository\SystemRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class SystemController extends Controller
{
    /**
     * @var SystemRepositoryInterface
     */
    private $systemRepository;

    /**
     * ItemController constructor.
     * @param SystemRepositoryInterface $systemRepository
     */
    public function __construct(SystemRepositoryInterface $systemRepository)
    {
        $this->systemRepository = $systemRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $systems = System::all();
        return view('frontend.systems.index',compact('systems'));
    }

    public function show($id)
    {

        $system = $this->systemRepository->find($id);

        return view('frontend.systems.show', compact('system'));

    }

//    public function showSingleSystem($id, $name)
//    {
//
//        $system = $this->systemRepository->find($id);
//
//        return view('frontend.systems.show', compact('system'));
//
//    }



}
