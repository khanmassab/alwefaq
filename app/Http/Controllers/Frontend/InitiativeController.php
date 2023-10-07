<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Initiative;
use App\Repository\InitiativeRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class InitiativeController extends Controller
{
    /**
     * @var InitiativeRepositoryInterface
     */
    private $initiativeRepository;

    /**
     * ItemController constructor.
     * @param InitiativeRepositoryInterface $initiativeRepository
     */
    public function __construct(InitiativeRepositoryInterface $initiativeRepository)
    {
        $this->initiativeRepository = $initiativeRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $initiatives = Initiative::all();
        return view('frontend.initiatives.index',compact('initiatives'));
    }

    public function show($id)
    {

        $initiative = $this->initiativeRepository->find($id);

        return view('frontend.initiatives.show', compact('initiative'));

    }

//    public function showSingleInitiative($id, $name)
//    {
//
//        $initiative = $this->initiativeRepository->find($id);
//
//        return view('frontend.initiatives.show', compact('initiative'));
//
//    }



}
