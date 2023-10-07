<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 9/14/20, 3:08 PM
 * Last Modified: 3/7/20, 2:12 AM
 * Project Name: Wafaq
 * File Name: ActivityLogController.php
 */

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;
use Yajra\DataTables\DataTables;

class ActivityLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //
        return view('backend.admin.activity.index');
    }

    public function getActivityLog()
    {
        return Datatables::of(Activity::orderBy('created_at', 'desc')->get())
            ->addIndexColumn()
            ->addColumn('properties', function ($activity) {
                return $activity->properties;
            })
            ->addColumn('created_at', function ($activity) {
                return $activity->created_at->diffForHumans();
            })
            ->rawColumns(['created_at','properties'])
            ->make(true);
    }

}
