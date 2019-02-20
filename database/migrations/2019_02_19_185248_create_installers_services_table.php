<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstallersServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installer_service', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('installer_id')->unsigned()->nullable();
            $table->integer('service_id')->unsigned()->nullable();

            $table->foreign('service_id','fk_services_installer')->references('id')
            ->on('services')->onDelete('cascade');
            $table->foreign('installer_id','fk_installers_services')->references('id')
            ->on('installers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('installers_services');
    }
}
