<?php
/**
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 2/1/20, 1:10 AM
 * Last Modified: 2/1/20, 12:15 AM
 * Project Name: Wafaq
 * File Name: DumyDataSeeder.php
 */

use App\Models\Administrative;
use App\Models\Ashom;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\City;
use App\Models\HelpRequest;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\Nationality;
use App\Models\Page;
use App\Models\Qualification;
use App\Models\Sadakat;
use App\Models\Slider;
use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\File;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        if (env('APP_ENV') != 'dev') {
            return;
        }
        File::makeDirectory(public_path("/uploads/"), 0777, true, true);
        File::makeDirectory(public_path("/uploads/sliders/"), 0777, true, true);
        File::makeDirectory(public_path("/uploads/transfers/"), 0777, true, true);

        Page::updateOrCreate([
            'slug' => 'systems',
            'title' => 'الانظمة',
        ], [
            'content' => 'الانظمة'
        ]);

        Page::updateOrCreate([
            'slug' => 'electronic-services',
            'title' => 'خدماتنا الإلكترونية',
        ], [
            'content' => 'خدماتنا الإلكترونية'
        ]);

        Page::updateOrCreate([
            'slug' => 'wefaq-gate',
            'title' => 'بوابة الوفاق',
        ], [
            'content' => 'بوابة الوفاق'
        ]);

        Page::updateOrCreate([
            'slug' => 'development-initiatives',
            'title' => 'المبادرات التنموية',
        ], [
            'content' => 'المبادرات التنموية'
        ]);

        Page::updateOrCreate([
            'slug' => 'programs-and-training',
            'title' => 'البرامج والتدريب',
        ], [
            'content' => 'البرامج والتدريب'
        ]);

        Page::updateOrCreate([
            'slug' => 'privacy-policy',
            'title' => 'شروط الخصوصية',
        ], [
            'content' => 'شروط الخصوصية'
        ]);

        Page::updateOrCreate([
            'slug' => 'about-us',
            'title' => 'من نحن',
        ], [
            'content' => 'من نحن'
        ]);
        Page::updateOrCreate([
            'slug' => 'donation-ways',
            'title' => 'طرق التبرع',
        ], [
            'content' => 'طرق التبرع'
        ]);


//        Slider::factory()->count(10)->create();
//        Administrative::factory()->count(10)->create();
//        Attribute::factory()->count(10)->create();
//        AttributeValue::factory()->count(100)->create();
//        Ashom::factory()->count(10)->create();
//        City::factory()->count(10)->create();
//        HelpRequest::factory()->count(100)->create();
//        Job::factory()->count(10)->create();
//        JobApplication::factory()->count(100)->create();
//        Nationality::factory()->count(10)->create();
//        Qualification::factory()->count(10)->create();
//        Sadakat::factory()->count(10)->create();


    }
}
