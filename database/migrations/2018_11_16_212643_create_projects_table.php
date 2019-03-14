<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('owner_id');
          $table->string('projectThumb',255)->nullable();
          $table->string('projectName',255)->nullable();
          $table->text('shortDescription')->nullable();
          $table->string('projectLocation',128)->nullable();
          $table->string('projectCounty',64)->nullable();
          $table->string('projectCountry',64)->nullable();
          $table->decimal('loc_lat', 10, 6)->nullable();
          $table->decimal('loc_lon', 10, 6)->nullable();
          $table->string('energyStandard',128);
          $table->string('alt_energyStandard',128)->nullable();
          $table->enum('buildType',['New build','Refurbishment','Mixed']);
          $table->enum('buildingSector',['Private Residential','Public Residential','Public','Commercial','Mixed-use','Industrial']);
          $table->enum('propertyType',['Detached','Semi-Detached','End Terrace','Mid Terrace']);
          $table->enum('constructionType',['Stone','Solid Brick','Masonry Cavity','Oak frame','Softwood frame','Steel frame', 'Concrete frame','Other']);
          $table->string('alt_constructionType',255)->nullable();
          $table->double('floorArea',10,2);
          $table->enum('floorAreaCalcMethod',['phpp','sap','approx']);
          $table->double('electric_fuelUse', 8, 2)->nullable();
          $table->double('gas_fuelUse', 8, 2)->nullable();
          $table->double('oil_fuelUse', 8, 2)->nullable();
          $table->double('lpg_fuelUse', 8, 2)->nullable();
          $table->double('wood_fuelUse', 8, 2)->nullable();
          $table->double('electric_predev_fuelUse', 8, 2)->nullable();
          $table->double('gas_predev_fuelUse', 8, 2)->nullable();
          $table->double('oil_predev_fuelUse', 8, 2)->nullable();
          $table->double('lpg_predev_fuelUse', 8, 2)->nullable();
          $table->double('wood_predev_fuelUse', 8, 2)->nullable();
          $table->double('electric_forecast_fuelUse', 8, 2)->nullable();
          $table->double('gas_forecast_fuelUse', 8, 2)->nullable();
          $table->double('oil_forecast_fuelUse', 8, 2)->nullable();
          $table->double('lpg_forecast_fuelUse', 8, 2)->nullable();
          $table->double('wood_forecast_fuelUse', 8, 2)->nullable();
          $table->double('annualHeatReq')->nullable();
          $table->double('heatLoad')->nullable();
          //$table->double('renewables_consumed')-->nullable();
          $table->char('active_flag', 1)->default('1');
          $table->char('passivhauscertificate', 1)->default(0);
          $table->char('aecb-certificate', 1)->default(0);
          $table->tinyInteger('featuredproject')->default('0');
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
        Schema::dropIfExists('projects');
    }
}
