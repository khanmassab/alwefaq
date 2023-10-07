<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 9/15/20, 8:41 PM
 * Last Modified: 9/15/20, 8:41 PM
 * Project Name: Wafaq
 * File Name: RepositoryServiceProvider.php
 */
declare(strict_types=1);

namespace App\Providers;

use App\Repository\AdministrativeRepository;
use App\Repository\AdministrativeRepositoryInterface;
use App\Repository\AdminRepository;
use App\Repository\AdminRepositoryInterface;
use App\Repository\AlbumImageRepository;
use App\Repository\AlbumImageRepositoryInterface;
use App\Repository\AlbumRepository;
use App\Repository\AlbumRepositoryInterface;
use App\Repository\AshomRepository;
use App\Repository\AshomRepositoryInterface;
use App\Repository\AttributeRepository;
use App\Repository\AttributeRepositoryInterface;
use App\Repository\BaseRepository\BaseRepository;
use App\Repository\BaseRepository\EloquentRepositoryInterface;
use App\Repository\CityRepository;
use App\Repository\CityRepositoryInterface;
use App\Repository\ItemRepository;
use App\Repository\ItemRepositoryInterface;
use App\Repository\ContactusRepository;
use App\Repository\ContactusRepositoryInterface;
use App\Repository\JobApplicationRepository;
use App\Repository\JobApplicationRepositoryInterface;
use App\Repository\VolunteerApplicationRepository;
use App\Repository\VolunteerApplicationRepositoryInterface;
use App\Repository\VolunteerRepository;
use App\Repository\VolunteerRepositoryInterface;
use App\Repository\JobRepository;
use App\Repository\JobRepositoryInterface;
use App\Repository\NationalityRepository;
use App\Repository\NationalityRepositoryInterface;
use App\Repository\NewsCategoryRepository;
use App\Repository\NewsCategoryRepositoryInterface;
use App\Repository\NewsRepository;
use App\Repository\NewsRepositoryInterface;
use App\Repository\ServiceRepository;
use App\Repository\ServiceRepositoryInterface;
use App\Repository\PageRepository;
use App\Repository\PageRepositoryInterface;
use App\Repository\QualificationRepository;
use App\Repository\QualificationRepositoryInterface;
use App\Repository\SadakatRepository;
use App\Repository\SadakatRepositoryInterface;
use App\Repository\SettingRepository;
use App\Repository\SettingRepositoryInterface;
use App\Repository\SliderRepository;
use App\Repository\SliderRepositoryInterface;
use App\Repository\MarriageRequestRepository;
use App\Repository\MarriageRequestRepositoryInterface;
use App\Repository\MatchRequestRepository;
use App\Repository\MatchRequestRepositoryInterface;
use App\Repository\MismatchRequestRepository;
use App\Repository\MismatchRequestRepositoryInterface;
use App\Repository\VideoRepository;
use App\Repository\VideoRepositoryInterface;
use App\Repository\HelpRequestRepository;
use App\Repository\HelpRequestRepositoryInterface;
use App\Repository\CartRepository;
use App\Repository\CartRepositoryInterface;
use App\Repository\OrderRepository;
use App\Repository\OrderRepositoryInterface;
use App\Repository\OrderItemRepository;
use App\Repository\OrderItemRepositoryInterface;
use App\Repository\TransferRepository;
use App\Repository\TransferRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repository\InformationRepository;
use App\Repository\InformationRepositoryInterface;
use App\Repository\UserRepository;
use App\Repository\UserRepositoryInterface;
use App\Repository\PartnerRepository;
use App\Repository\PartnerRepositoryInterface;
use App\Repository\ReportRepository;
use App\Repository\ReportRepositoryInterface;
use App\Repository\SystemRepository;
use App\Repository\SystemRepositoryInterface;
use App\Repository\InitiativeRepository;
use App\Repository\InitiativeRepositoryInterface;
use App\Repository\ProgramRepository;
use App\Repository\ProgramRepositoryInterface;
use App\Repository\AboutRepository;
use App\Repository\AboutRepositoryInterface;
use App\Repository\FooterRepository;
use App\Repository\FooterRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(AdminRepositoryInterface::class, AdminRepository::class);
        $this->app->bind(SettingRepositoryInterface::class, SettingRepository::class);
        $this->app->bind(ContactusRepositoryInterface::class, ContactusRepository::class);
        $this->app->bind(SliderRepositoryInterface::class, SliderRepository::class);
        $this->app->bind(PageRepositoryInterface::class, PageRepository::class);
        $this->app->bind(AdministrativeRepositoryInterface::class, AdministrativeRepository::class);
        $this->app->bind(AshomRepositoryInterface::class, AshomRepository::class);
        $this->app->bind(AttributeRepositoryInterface::class, AttributeRepository::class);
        $this->app->bind(MarriageRequestRepositoryInterface::class, MarriageRequestRepository::class);
        $this->app->bind(MatchRequestRepositoryInterface::class, MatchRequestRepository::class);
        $this->app->bind(MismatchRequestRepositoryInterface::class, MismatchRequestRepository::class);
        $this->app->bind(CityRepositoryInterface::class, CityRepository::class);
        $this->app->bind(JobApplicationRepositoryInterface::class, JobApplicationRepository::class);
        $this->app->bind(JobRepositoryInterface::class, JobRepository::class);
        $this->app->bind(VolunteerApplicationRepositoryInterface::class, VolunteerApplicationRepository::class);
        $this->app->bind(VolunteerRepositoryInterface::class, VolunteerRepository::class);
        $this->app->bind(NationalityRepositoryInterface::class, NationalityRepository::class);
        $this->app->bind(QualificationRepositoryInterface::class, QualificationRepository::class);
        $this->app->bind(SadakatRepositoryInterface::class, SadakatRepository::class);
        $this->app->bind(NewsRepositoryInterface::class, NewsRepository::class);
        $this->app->bind(ServiceRepositoryInterface::class, ServiceRepository::class);
        $this->app->bind(NewsCategoryRepositoryInterface::class, NewsCategoryRepository::class);
        $this->app->bind(AlbumRepositoryInterface::class, AlbumRepository::class);
        $this->app->bind(AlbumImageRepositoryInterface::class, AlbumImageRepository::class);
        $this->app->bind(VideoRepositoryInterface::class, VideoRepository::class);
        $this->app->bind(ItemRepositoryInterface::class, ItemRepository::class);
        $this->app->bind(HelpRequestRepositoryInterface::class, HelpRequestRepository::class);
        $this->app->bind(CartRepositoryInterface::class, CartRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(OrderItemRepositoryInterface::class, OrderItemRepository::class);
        $this->app->bind(TransferRepositoryInterface::class, TransferRepository::class);
        $this->app->bind(InformationRepositoryInterface::class, InformationRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(PartnerRepositoryInterface::class, PartnerRepository::class);
        $this->app->bind(ReportRepositoryInterface::class, ReportRepository::class);
        $this->app->bind(SystemRepositoryInterface::class, SystemRepository::class);
        $this->app->bind(InitiativeRepositoryInterface::class, InitiativeRepository::class);
        $this->app->bind(ProgramRepositoryInterface::class, ProgramRepository::class);
        $this->app->bind(AboutRepositoryInterface::class, AboutRepository::class);
        $this->app->bind(FooterRepositoryInterface::class, FooterRepository::class);

    }
}
