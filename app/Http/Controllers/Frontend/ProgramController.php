<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Repository\ProgramRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ProgramController extends Controller
{
    /**
     * @var ProgramRepositoryInterface
     */
    private $programRepository;

    /**
     * ItemController constructor.
     * @param ProgramRepositoryInterface $programRepository
     */
    public function __construct(ProgramRepositoryInterface $programRepository)
    {
        $this->programRepository = $programRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $programs = Program::all();
        return view('frontend.programs.index',compact('programs'));
    }

    public function show($id)
    {

        $program = $this->programRepository->find($id);

        return view('frontend.programs.show', compact('program'));

    }

//    public function showSingleProgram($id, $name)
//    {
//
//        $program = $this->programRepository->find($id);
//
//        return view('frontend.programs.show', compact('program'));
//
//    }



}
