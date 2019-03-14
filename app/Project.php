<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'owner_id',
    'projectName',
    'shortDescription',
    'projectLocation',
    'projectCounty',
    'projectCountry',
    'energyStandard',
    'projectThumb',
    'alt_energyStandard',
    'buildType',
    'buildingSector',
    'propertyType',
    'constructionType',
    'alt_constructionType',
    'floorArea',
    'floorAreaCalcMethod',
    'electric_fuelUse','gas_fuelUse','oil_fuelUse','lpg_fuelUse','wood_fuelUse',
    'electric_predev_fuelUse','gas_predev_fuelUse','oil_predev_fuelUse','lpg_predev_fuelUse','wood_predev_fuelUse',
    'electric_forecast_fuelUse','gas_forecast_fuelUse','oil_forecast_fuelUse','lpg_forecast_fuelUse','wood_forecast_fuelUse',
    'annualHeatReq','heatLoad'
  ];

    /**
     * Short Desc
     *
     * @return string
     */
  public function owner()
{
  return $this->belongsTo(User::class);
}

}
