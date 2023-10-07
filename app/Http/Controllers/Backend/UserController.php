<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 10/21/20, 11:33 AM
 * Last Modified: 10/21/20, 11:19 AM
 * Project Name: wafaq
 * File Name: JobController.php
 */

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\UserCreateRequest;
use App\Http\Requests\Backend\UserUpdateRequest;
use App\Models\User;
use App\Repository\UserRepositoryInterface;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * UserController constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
//        $this->middleware('auth');
//        $this->middleware('permission:jobs.manage');
//        $this->middleware('permission:jobs.add', ['only' => ['create']]);
//        $this->middleware('permission:jobs.edit', ['only' => ['edit','update']]);
//        $this->middleware('permission:jobs.delete', ['only' => ['destroy']]);
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        //
        return view('backend.admin.users.index');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getUsers()
    {
        return Datatables::of($this->userRepository->getDatatable())
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $edit = '<a href="' . route('users.edit', $row->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
                $delete = '<a id="deleteButton" data-id="' . $row->id . '" type="button" class="btn btn-sm btn-danger">' . trans('app.delete') . '</a>';
                return $edit . ' ' . $delete;
            })
            ->addColumn('created_at', function ($row) {
                return $row->created_at->diffForHumans();
            })
            ->addColumn('updated_at', function ($row) {
                return $row->updated_at->diffForHumans();
            })

            ->rawColumns(['action', 'created_at', 'updated_at'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        //
        $edit = false;
        return view('backend.admin.users.add-edit', compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserCreateRequest $request
     * @return Response
     */
    public function store(UserCreateRequest $request)
    {
        $rand = rand(10000,99999);

        User::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'phoneNumber' => $request->phoneNumber,
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'email' => $request->email,
            'is_verify' => 0 ,
            'verification_code' => $rand ,
            'password' => $request->password,
        ]);
        return redirect()->route('users.index')->withSuccess(trans('app.success_created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Factory|View
     */
    public function edit($id)
    {
        //
        $edit = true;
        $users = $this->userRepository->find($id);
        return view('backend.admin.users.add-edit', compact('edit', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdateRequest $request
     * @param int $id
     * @return Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $dataUpdated = [
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'phoneNumber' => $request->phoneNumber,
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'email' => $request->email,
        ];
        if($request->has('password') && $request->get('password'))
        {
            $dataUpdated['password'] = $request->password;
        }

        User::find($id)->update($dataUpdated);



        return redirect()->route('users.index')->withSuccess(trans('app.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request)
    {
        //
        $this->userRepository->destroy($request->id);

        return response()->json(['message' => 'success']);
    }
}
