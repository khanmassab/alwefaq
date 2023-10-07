<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Information;
use App\Models\Service;
use App\Models\System;
use App\Models\Setting;
use App\Repository\ServiceRepositoryInterface;
use App\Repository\SystemRepositoryInterface;
use App\Repository\SettingRepositoryInterface;
use Illuminate\Http\Request;
use App\Repository\SliderRepositoryInterface;
use App\Repository\NewsRepositoryInterface;
use App\Repository\PartnerRepositoryInterface;


class HomeController extends Controller
{
    /**
     * @var SliderRepositoryInterface
     * @var NewsRepositoryInterface
     * @var PartnerRepositoryInterface
     */
    private $sliderRepository;
    private $newsRepository;
    private $serviceRepository;
    private $partnerRepository;
    private $systemRepository;
    private $settingRepository;

    /**
     * HomeController constructor.
     * @param SliderRepositoryInterface $sliderRepository
     */
    public function __construct(SliderRepositoryInterface $sliderRepository,NewsRepositoryInterface $newsRepository, ServiceRepositoryInterface $serviceRepository,PartnerRepositoryInterface $partnerRepository,SystemRepositoryInterface $systemRepository,SettingRepositoryInterface $settingRepository )
    {
        $this->sliderRepository = $sliderRepository;
        $this->newsRepository = $newsRepository;
        $this->serviceRepository = $serviceRepository;
        $this->partnerRepository = $partnerRepository;
        $this->systemRepository = $systemRepository;
        $this->settingRepository = $systemRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $information = Information::all();
        $sliders = $this->sliderRepository->all();
        $news = $this->newsRepository->all();
        $services = Service::all();
        $partners = $this->partnerRepository->all();
        $systems = System::all();
        $settings = optional(Setting::find(1))->get();
        return view('frontend.index', compact('sliders','news', 'services','systems','information','partners','settings'));
    }
    public function search(Request $request)
    {
        $news = $this->newsRepository->getSearch($request);
        return view('frontend.search', compact('news'));
    }
}
