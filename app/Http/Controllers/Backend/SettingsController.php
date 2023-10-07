<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 9/14/20, 3:09 PM
 * Last Modified: 2/1/20, 12:05 AM
 * Project Name: Wafaq
 * File Name: SettingsController.php
 */


namespace App\Http\Controllers\Backend;
use App\Http\Requests\Backend\SettingCreateRequest;
use App\Http\Requests\Backend\SettingUpdateRequest;
use App\Repository\SettingRepositoryInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SettingsController extends Controller
{
    private $settingRepository;

    /**
     * CurriculumController constructor.
     * @param AboutRepositoryInterface $aboutRepository
     */
    public function __construct(SettingRepositoryInterface $settingRepository)
    {
//        $this->middleware('auth:admin');
//        $this->middleware('permission:abouts.manage');
//        $this->middleware('permission:abouts.add', ['only' => ['create']]);
//        $this->middleware('permission:abouts.edit', ['only' => ['edit']]);
//        $this->middleware('permission:abouts.delete', ['only' => ['destroy']]);
        $this->settingRepository = $settingRepository;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $setting = $this->settingRepository->find(1);
        
        return view('backend.admin.setting.index', compact('setting'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SettingCreateRequest $request)
    {
        //
        $this->settingRepository->createWithUploadImage($request,1);
        return redirect()->route('settings.index')->withSuccess(trans('app.success_created'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettingUpdateRequest $request, $id)
    {
        //
        $this->settingRepository->createWithUploadImage($request, 1);
        return redirect()->route('settings.index')->withSuccess(trans('app.success_created'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function destroy1()
    {
        //
        
        $this->settingRepository->deleteImage(1);
        
                return redirect()->route('settings.index')->withSuccess(trans('app.success_created'));

        
    }
    public function destroy2()
    {
        //
        $this->settingRepository->deleteImage(2);
        return redirect()->route('settings.index')->withSuccess(trans('app.success_created'));
        
    }
}
