<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 9/14/20, 3:09 PM
 * Last Modified: 3/2/20, 1:01 PM
 * Project Name: Wafaq
 * File Name: DashboardController.php
 */

namespace App\Http\Controllers\Backend;

use App\Charts\AppChart;
use App\Http\Controllers\Controller;
use App\Models\HelpRequest;
use App\Models\JobApplication;
use App\Models\MarriageRequest;
use App\Models\User;
use Carbon\Carbon;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = [];

        $data['users_count'] = User::count();
        $data['help_requests_count'] = HelpRequest::count();
        $data['marriage_requests_count'] = MarriageRequest::count();
        $data['job_applications_count'] = JobApplication::count();

        return view('backend.admin.dashboard.index',compact('data'));
    }
//    public function index()
//    {
//        $cartOption = [[
//            'scales' => [
//                'xAxes' => [
//                    'gridLines' => [
//                        'display' => false
//                    ],
//                    'ticks' => [
//                        'fontColor' => '#aaa'
//                    ]
//                ],
//                'yAxes' => [
//                    'gridLines' => [
//                        'display' => false
//                    ],
//                    'ticks' => [
//                        'fontColor' => '#aaa',
//                        'stepSize' => 10
//                    ]
//                ]
//            ],
//            'responsive' => true,
//            'maintainAspectRatio' => false
//        ]];


//        $StudentPerMonth = $this->countOfNewStudentPerMonth(
//            Model::class,
//            Carbon::now()->subYear()->startOfMonth(),
//            Carbon::now()->endOfMonth()
//        );

//        $student = [
//            'total' => Model::all()->count(),
//            'new' => Model::whereBetween('created_at', [Carbon::now()->firstOfMonth(), Carbon::now()])->count(),
//            'active' => Model::all()->count(),
//            'banned' => Model::all()->count(),
//            'unconfirmed' => Model::all()->count(),
//        ];

//        // StudentChart
//        $StudentChart = new AppChart();
//        $StudentChart->labels(array_keys($StudentPerMonth));
//        $StudentChart->dataset(trans('app.student_registration_history'), 'line', array_values($StudentPerMonth))->options([
//            'borderColor' => 'rgba(28,180,255,1)',
//            'borderWidth' => 1,
//            'backgroundColor' => 'rgba(28,180,255,.05)',
//        ]);
//        $StudentChart->options($cartOption);
//
//        return view('backend.admin.dashboard.index');
//    }

    /**
     * Count Model and get Value for chart
     *
     * @param $model
     * @param Carbon $from
     * @param Carbon $to
     * @return array
     */
    public function countOfNewStudentPerMonth($model, Carbon $from, Carbon $to)
    {
        $result = $model::whereBetween('created_at', [$from, $to])
            ->orderBy('created_at')
            ->get(['created_at'])
            ->groupBy(function ($row) {
                return $row->created_at->format("Y_n");
            });

        $counts = [];

        while ($from->lt($to)) {
            $key = $from->format("Y_n");

            $counts[$this->parseDate($key)] = count($result->get($key, []));

            $from->addMonth();
        }

        return $counts;
    }

    private function parseDate($yearMonth)
    {
        list($year, $month) = explode("_", $yearMonth);

        $month = trans("app.months.{$month}");

        return "{$month} {$year}";
    }
}
