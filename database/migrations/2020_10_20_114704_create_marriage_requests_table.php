<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarriageRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marriage_requests', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('nationality_id')->nullable();
            $table->foreign('nationality_id')->references('id')->on('nationalities')->onDelete('cascade');

            $table->unsignedBigInteger('qualification_id')->nullable();
            $table->foreign('qualification_id')->references('id')->on('qualifications')->onDelete('cascade');

            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');

            $table->string('province')->nullable();

            $table->string('birthday_type')->nullable();
            $table->date('birthday')->nullable();
            $table->string('age')->nullable();

            $table->tinyInteger('tripe')->nullable();
            $table->tinyInteger('head_cover')->nullable();
            $table->tinyInteger('face_cover')->nullable();
            $table->tinyInteger('hand_cover')->nullable();
            $table->tinyInteger('body_cover')->nullable();
            $table->string('shape')->nullable();
            $table->string('hair')->nullable();
            $table->string('beared')->nullable();
            $table->tinyInteger('smoked')->nullable();
            $table->string('religion')->nullable();
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->string('skin_color')->nullable();
            $table->string('health_status')->nullable();
            $table->string('social_status')->nullable();
            $table->string('financial_status')->nullable();
            
            $table->string('job_title')->nullable();
            $table->string('job_in')->nullable();
            $table->string('job_type')->nullable();
            $table->string('monthly_income')->nullable();
            
            $table->text('note')->nullable();


            $table->string('request_type')->nullable();
            $table->tinyInteger('status')->default('0')->nullable();

            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marriage_requests');
    }
}
