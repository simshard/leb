<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
      'projectName' => $faker->sentence,
      'owner_id' => factory(App\User::class)->create()->id,
      'shortDescription' => $faker->paragraph,
      'projectLocation' => $faker->city,
      'projectCounty' => $faker->word,
      'projectCountry'=> $faker->country,
      'loc_lat' => $faker->latitude,
      'loc_lon' => $faker->longitude,
      'energyStandard'=>$faker->randomElement(array("2002 Building Regs","2006 Building Regs","AECB Silver","AECB Gold","PassivHaus","EnerPHit", "CSH 3","CSH 4","CSH 5","CSH 6","R-2000", "Minergie", "Minergie Eco", "Minergie P","Minergie P Eco","Retrofit for the Future","other")),
      'buildType'=> $faker->randomElement(array( 'New build','Refurbishment','Mixed') ),
      'buildingSector'=> $faker->randomElement(array( 'Private Residential','Public Residential','Public','Commercial','Mixed-use','Industrial')),
      'propertyType'=> $faker->randomElement(array('Detached','Semi-Detached','End Terrace','Mid Terrace')),
      'constructionType'=> $faker->randomElement(array('Stone','Solid Brick','Masonry Cavity','Oak frame','Softwood frame','Steel frame', 'Concrete frame','Other')),
      'floorArea'=> $faker-> numberBetween($min = 25, $max = 2000),
      'floorAreaCalcMethod'=> $faker->randomElement(array('PHPP','SAP','Approx')),
      'electric_fuelUse'=> $faker-> numberBetween($min = 0, $max = 20000),
      'gas_fuelUse'=> $faker-> numberBetween($min = 0, $max = 20000),
      'oil_fuelUse'=> $faker-> numberBetween($min = 0, $max = 20000),
      'lpg_predev_fuelUse'=> $faker-> numberBetween($min = 0, $max = 20000),
      'wood_predev_fuelUse'=> $faker-> numberBetween($min = 0, $max = 20000),
      'electric_predev_fuelUse'=> $faker-> numberBetween($min = 0, $max = 20000),
      'gas_predev_fuelUse'=> $faker-> numberBetween($min = 0, $max = 20000),
      'oil_predev_fuelUse'=> $faker-> numberBetween($min = 0, $max = 20000),
      'lpg_predev_fuelUse'=> $faker-> numberBetween($min = 0, $max = 20000),
      'wood_predev_fuelUse'=> $faker-> numberBetween($min = 0, $max = 20000),
      'electric_forecast_fuelUse'=> $faker-> numberBetween($min = 0, $max = 20000),
      'gas_forecast_fuelUse'=> $faker-> numberBetween($min = 0, $max = 20000),
      'oil_forecast_fuelUse'=> $faker-> numberBetween($min = 0, $max = 20000),
      'lpg_forecast_fuelUse'=> $faker-> numberBetween($min = 0, $max = 20000),
      'wood_forecast_fuelUse'=> $faker-> numberBetween($min = 0, $max = 20000), 
      'annualHeatReq'=> $faker-> numberBetween($min = 0, $max = 100),
       'heatLoad'=> $faker-> numberBetween($min =0, $max = 100),

    ];
});
