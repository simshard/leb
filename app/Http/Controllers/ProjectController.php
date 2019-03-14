<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Project;

/**
 * Short desc
 *
 * @category ProjectController
 * @package  Null
 * @author   Display Name <Sim@localhost.local>
 * @license  GPL http://opensource.org
 * @link     http://opensource.org/licenses/gpl-license.php GNU Public License
 */
class ProjectController extends Controller
{
    /**
     * Projects
     */
    public $projects;
    /**
     * Logged in user required on all route methods except index|show
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @param \App\Project object $project comment text
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        $projects=$project->latest()->paginate(9);
        return view('index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('projects.create', ['project' => new Project]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param object $project comment text
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Project $project)
    {
        $attributes=$this->validate(
            request(),
            [
            'projectName'=>'required|string|min:3|max:255',
            'shortDescription'=>'required|string|min:3|max:255',
            'projectLocation'=>'required',
            'projectCounty'=>'required',
            'projectCountry'=>'required',
            'energyStandard'=>'required',
            'alt_energyStandard'=>'required_if:energyStandard,Other',
            'buildType'=>'required',
            'buildingSector'=>'required',
            'propertyType'=>'required',
            'constructionType'=>'required',
            'alt_constructionType'=>'required_if:constructionType,Other',
            'floorArea'=>'required|Numeric|min:1',
            'floorAreaCalcMethod'=>'required',
            'electric_fuelUse'=>'numeric|nullable',
            'gas_fuelUse'=>'numeric|nullable',
            'oil_fuelUse'=>'numeric|nullable',
            'lpg_fuelUse'=>'numeric|nullable',
            'wood_fuelUse'=>'numeric|nullable',
            'electric_predev_fuelUse'=>'numeric|nullable',
            'gas_predev_fuelUse'=>'numeric|nullable',
            'oil_predev_fuelUse'=>'numeric|nullable',
            'lpg_predev_fuelUse'=>'numeric|nullable',
            'wood_predev_fuelUse'=>'numeric|nullable',
            'electric_forecast_fuelUse'=>'numeric|nullable',
            'gas_forecast_fuelUse'=>'numeric|nullable',
            'oil_forecast_fuelUse'=>'numeric|nullable',
            'lpg_forecast_fuelUse'=>'numeric|nullable',
            'wood_forecast_fuelUse'=>'numeric|nullable',
            'annualHeatReq'=>'numeric|nullable',
            'heatLoad'=>'numeric|nullable',
            ]
        );
        $attributes['owner_id']=Auth::user()->id;
        $projectInsert= Project::create($attributes)->id;
        $message= $attributes['projectName'] .'('.$projectInsert.') Saved';
        //  return redirect('home')->with('message', $message);
        return redirect('/projects/'.$projectInsert.'/uploadfile')->with('message', $message);
        ;
        //  return $message;
    }



    /**
     * Display the specified resource.
     *
     * @param \App\Project $project resource aaa
     *
     * @return \Illuminate\Http\Response
     */
    public function show(project $project)
    {
      /*Fuel Use Calculations  to determin primary energy use and  CO2 emissions*/
      $ergFactor_electric=2.5;
      $ergFactor_gas=1.15;
      $ergFactor_oil=1.19;
      $ergFactor_lpg=1.1;
      $ergFactor_wood=1.1;
      $ergFactor_solidfuel=1.1;
      $co2Factor_electric=0.591;
      $co2Factor_gas=0.206;
      $co2Factor_oil=0.284;
      $co2Factor_lpg=0.251;
      $co2Factor_wood=0.018;
      /*  *******  */

      $fuelusage['electric_primary']=round(($project->electric_fuelUse*$ergFactor_electric)/$project->floorArea,2);
      $fuelusage['gas_primary']=round(($project->gas_fuelUse*$ergFactor_gas)/$project->floorArea,2);
      $fuelusage['oil_primary']=round(($project->oil_fuelUse*$ergFactor_oil)/$project->floorArea,2);
      $fuelusage['lpg_primary']=round(($project->lpg_fuelUse*$ergFactor_lpg)/$project->floorArea,2);
      $fuelusage['wood_primary']=round(($project->wood_fuelUse*$ergFactor_wood)/$project->floorArea,2);
      $fuelusage['electric_CO2emit']=round(($project->electric_fuelUse*$co2Factor_electric)/$project->floorArea,2);
      $fuelusage['gas_CO2emit']=round(($project->gas_fuelUse*$co2Factor_gas )/$project->floorArea,2);
      $fuelusage['oil_CO2emit']=round(($project->oil_fuelUse*$co2Factor_oil )/$project->floorArea,2);
      $fuelusage['lpg_CO2emit']=round(($project->lpg_fuelUse*$co2Factor_lpg )/$project->floorArea,2);
      $fuelusage['wood_CO2emit']=round(($project->wood_fuelUse*$co2Factor_wood )/$project->floorArea,2);

      $fuelusage['electric_predevPrimary']=round(($project->electric_predev_fuelUse*$ergFactor_electric)/$project->floorArea,2);
      $fuelusage['gas_predevPrimary']=round(($project->gas_predev_fuelUse*$ergFactor_gas)/$project->floorArea,2);
      $fuelusage['oil_predevPrimary']=round(($project->oilPrimary_predev_fuelUse*$ergFactor_oil)/$project->floorArea,2);
      $fuelusage['lpg_predevPrimary']=round(($project->lpg_predev_fuelUse*$ergFactor_lpg)/$project->floorArea,2);
      $fuelusage['wood_predevPrimary']=round(($project->wood_predev_fuelUse*$ergFactor_wood)/$project->floorArea,2);
      $fuelusage['electric_predevCO2emit']=round(($project->electric_predev_fuelUse*$co2Factor_electric)/$project->floorArea,2);
      $fuelusage['gas_predevCO2emit']=round(($project->gas_predev_fuelUse*$co2Factor_gas)/$project->floorArea,2);
      $fuelusage['oil_predevCO2emit']=round(($project->oil_predev_fuelUse*$co2Factor_oil)/$project->floorArea,2);
      $fuelusage['lpg_predevCO2emit']=round(($project->lpg_predev_fuelUse*$co2Factor_lpg)/$project->floorArea,2);
      $fuelusage['wood_predevCO2emit']=round(($project->wood_predev_fuelUse*$co2Factor_wood)/$project->floorArea,2);

      $fuelusage['electric_forecastPrimary']=round(($project->electric_forecast_fuelUse*$ergFactor_electric)/$project->floorArea,2);
      $fuelusage['gas_forecastPrimary']=round(($project->gas_forecast_fuelUse*$ergFactor_gas)/$project->floorArea,2);
      $fuelusage['oil_forecastPrimary']=round(($project->oil_forecast_fuelUse*$ergFactor_oil)/$project->floorArea,2);
      $fuelusage['lpg_forecastPrimary']=round(($project->lpg_forecast_fuelUse*$ergFactor_lpg)/$project->floorArea,2);
      $fuelusage['wood_forecastPrimary']=round(($project->wood_forecast_fuelUse*$ergFactor_wood)/$project->floorArea,2);
      $fuelusage['electric_forecastCO2emit']=round(($project->electric_forecast_fuelUse*$co2Factor_electric)/$project->floorArea,2);
      $fuelusage['gas_forecastCO2emit']=round(($project->gas_forecast_fuelUse*$co2Factor_gas)/$project->floorArea,2);
      $fuelusage['oil_forecastCO2emit']=round(($project->oil_forecast_fuelUse*$co2Factor_oil)/$project->floorArea,2);
      $fuelusage['lpg_forecastCO2emit']=round(($project->lpg_forecast_fuelUse*$co2Factor_lpg)/$project->floorArea,2);
      $fuelusage['wood_forecastCO2emit']=round(($project->wood_forecast_fuelUse*$co2Factor_wood)/$project->floorArea,2);



      $fuelusage['PrimaryEnergyUse_predev']=round(($fuelusage['electric_predevPrimary']+$fuelusage['gas_predevPrimary']+$fuelusage['oil_predevPrimary']+$fuelusage['lpg_predevPrimary']+$fuelusage['wood_predevPrimary']),0);
      $fuelusage['CO2emit_predev']=round(($fuelusage['electric_predevCO2emit']+$fuelusage['gas_predevCO2emit']+$fuelusage['oil_predevCO2emit']+$fuelusage['lpg_predevCO2emit']+$fuelusage['wood_predevCO2emit']),0);

      $fuelusage['PrimaryEnergyUse_forecast']=round(($fuelusage['electric_forecastPrimary']+$fuelusage['gas_forecastPrimary']+$fuelusage['oil_forecastPrimary']+$fuelusage['lpg_forecastPrimary']+$fuelusage['wood_forecastPrimary']),0);
      $fuelusage['CO2emit_forecast']=round(($fuelusage['electric_forecastCO2emit']+$fuelusage['gas_forecastCO2emit']+$fuelusage['oil_forecastCO2emit']+$fuelusage['lpg_forecastCO2emit']+$fuelusage['wood_forecastCO2emit']),0);

      $fuelusage['PrimaryEnergyUse_measured']=round(($fuelusage['electric_primary']+$fuelusage['gas_primary']+$fuelusage['oil_primary']+$fuelusage['lpg_primary']+$fuelusage['wood_primary']),0);
      $fuelusage['CO2emit_measured']=round(($fuelusage['electric_CO2emit']+$fuelusage['gas_CO2emit']+$fuelusage['oil_CO2emit']+$fuelusage['lpg_CO2emit']+$fuelusage['wood_CO2emit']),0);




      $predevFuelusagebytype=json_encode(  [ $fuelusage['electric_predevPrimary'],$fuelusage['gas_predevPrimary'],$fuelusage['oil_predevPrimary'],
          $fuelusage['lpg_predevPrimary'],$fuelusage['wood_predevPrimary'] ] );

      $forecastFuelusagebytype=json_encode([$fuelusage['electric_forecastPrimary'],$fuelusage['gas_forecastPrimary'],$fuelusage['oil_forecastPrimary'],
          $fuelusage['lpg_forecastPrimary'],$fuelusage['wood_forecastPrimary']]);

      $measuredFuelusagebytype=json_encode([$fuelusage['electric_primary'],$fuelusage['gas_primary'],$fuelusage['oil_primary'],
          $fuelusage['lpg_primary'],$fuelusage['wood_primary']]);



        return  view('projects.show', compact('project','fuelusage','predevFuelusagebytype','forecastFuelusagebytype','measuredFuelusagebytype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Project $project resource aaa
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(project $project)
    {
        $this->authorize('update', $project);
        $project=compact('project');
        return view('projects.edit', $project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request object xxxx
     * @param \App\Project  $project object  xxx
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, project $project)
    {
        $this->authorize('update', $project);

        $attributes=$this->validate(
                request(),
                [
                'projectName'=>'required|string|min:3|max:255',
                'shortDescription'=>'required|string|min:3|max:255',
                'projectLocation'=>'required',
                'projectCounty'=>'required',
                'projectCountry'=>'required',
                'energyStandard'=>'required',
                'alt_energyStandard'=>'required_if:energyStandard,Other',
                'buildType'=>'required',
                'buildingSector'=>'required',
                'propertyType'=>'required',
                'constructionType'=>'required',
                'alt_constructionType'=>'required_if:constructionType,Other',
                'floorArea'=>'required|Numeric|min:1',
                'floorAreaCalcMethod'=>'required',
                'electric_fuelUse'=>'numeric|nullable',
                'gas_fuelUse'=>'numeric|nullable',
                'oil_fuelUse'=>'numeric|nullable',
                'lpg_fuelUse'=>'numeric|nullable',
                'wood_fuelUse'=>'numeric|nullable',
                'gas_predev_fuelUse'=>'numeric|nullable',
                'oil_predev_fuelUse'=>'numeric|nullable',
                'lpg_predev_fuelUse'=>'numeric|nullable',
                'wood_predev_fuelUse'=>'numeric|nullable',
                'electric_forecast_fuelUse'=>'numeric|nullable',
                'gas_forecast_fuelUse'=>'numeric|nullable',
                'oil_forecast_fuelUse'=>'numeric|nullable',
                'lpg_forecast_fuelUse'=>'numeric|nullable',
                'wood_forecast_fuelUse'=>'numeric|nullable',
                'annualHeatReq'=>'numeric|nullable',
                'heatLoad'=>'numeric|nullable',
                ]
            );
        $project->update($attributes);
        session()->flash('message', 'Project '.$attributes['projectName'].' was successfully updated');
        return redirect('home');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Project $project object blah
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(project $project)
    {
        $this->authorize('update', $project);
        $project->delete($project->id);
        session()->flash('message', 'project '. $project->projectName .' deleted successfully');
        return redirect('home');
    }

    /**
     * Xxx
     *
     * @param \App\Project $project object blah
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadFile(Project $project)
    {
        $this->authorize('update', $project);
        return view('projects.uploadFile')->with(['project'=>$project]);
    }

    /**
     * Xxx
     *
     * @param \App\Project $project object blah
     * @param \Illuminate\Http\Request $request object request
     *
     * @return \Illuminate\Http\Response
     */
    public static function uploadFilePost(Project $project, Request $request)
    {
        $request->validate(
            [
            'fileToUpload' => 'required|file|image|max:1024|mimetypes:image/jpeg,image/png|mimes:jpeg,png',
            ]
        );
        $imageTempName = $request->file('fileToUpload')->getPathname();
        $imageName = $request->file('fileToUpload')->getClientOriginalName(); //not safe!!
        $path = base_path() . '/public/storage/images/';
        $request->file('fileToUpload')->move($path, $imageName);

        $project->projectThumb =$imageName;
        $project->save();
        return back()
            ->with('success', 'successfully uploaded image '.$imageName.' and stored it');
    }



    /**
    * https://css-tricks.com/almanac/properties/o/overflow/
    * https://stackoverflow.com/questions/11757537/css-image-size-how-to-fill-not-stretch
    *
    * http://webdeveloperplus.com/css/25-incredibly-useful-css-tricks-you-should-know/
    * http://webdesignerwall.com/tutorials/5-useful-css-tricks-for-responsive-design
    */
}
