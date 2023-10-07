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
use App\Models\Notification;
use App\Repository\UserRepositoryInterface;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class NotificationController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    // private $userRepository;

    /**
     * UserController constructor.
     * @param UserRepositoryInterface $userRepository
     */
//     public function __construct(UserRepositoryInterface $userRepository)
//     {
// //        $this->middleware('auth');
// //        $this->middleware('permission:jobs.manage');
// //        $this->middleware('permission:jobs.add', ['only' => ['create']]);
// //        $this->middleware('permission:jobs.edit', ['only' => ['edit','update']]);
// //        $this->middleware('permission:jobs.delete', ['only' => ['destroy']]);
//         // $this->userRepository = $userRepository;
//     }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function send()
    {
        //
        return view('backend.admin.notifications.index');
    }
    
   public function sendnotificationToSpecificusers(Request $request)
    {
        $data = array();
        $NotificationModel = new Notification();
        $users = $request->input('users');
        $title = $request->input('title');
        $message = $request->input('message');
        if ($users) {
            // $usersResult = User::select('id', 'fcm_token')->whereIn('id', $users)->get();
            // if ($usersResult) {
            foreach ($users as $key => $value) {
                $NotificationModel->send_notification_android($value, $title, $message);
            }
        } else {
            $request->session()->put('error', trans('app.selectAtLeastOneUser'));
        }
        return redirect('/notifications');
    }
    public function sendnotificationToAllusers(Request $request)
    {
        
        $data = array();
        $NotificationModel = new Notification();
        
        $title = $request->input('title');
        $message = $request->input('message');
        $NotificationModel->send_notification_android(0, $title, $message);
    
        return redirect('/notifications');
        
    }
}
