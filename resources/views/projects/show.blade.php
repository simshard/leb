@extends('layouts.app')

@section('content')
  <div class="container">


    <div class="col-md-8 blog-main">
      <h3 class="pb-2 mb-2 font-italic border-bottom">{{ $project->projectName }}</h3>
    <div class="lead mb-2 py-2">
    {{ $project->shortDescription}}
    </div>
    <div class="box">

    <div class="projectprop p-2 ml-2">
    <strong>Location</strong>  {{ $project->projectLocation}}
    </div>
    <div class="projectprop p-2 ml-2">
     <strong>County</strong>  {{ $project->projectCounty}}
    </div>
    <div class="projectprop p-2 ml-2">
     <strong>Country</strong>  {{ $project->projectCountry}}
    </div>
    <div class="projectprop p-2 ml-2">
    <strong>Energy Standard</strong>  {{ $project->energyStandard}}
    </div>
    <div class="projectprop p-2 ml-2">
    <strong>Build Type</strong>  {{ $project->buildType}}
    </div>
    <div class="projectprop p-2 ml-2">
    <strong>Building Sector</strong>  {{ $project->buildingSector}}
    </div>
    <div class="projectprop p-2 ml-2">
    <strong>Property Type</strong>  {{ $project->propertyType}}
    </div>
    <div class="projectprop p-2 ml-2">
    <strong>Construction Type</strong>  {{ $project->constructionType}}
    </div>
    <div class="projectprop p-2 ml-2">
    <strong>Floor Area </strong> (m²)  {{ $project->floorArea}}
    </div>
    <div class="projectprop p-2 ml-2 mb4">
    <strong>Floor Area Calculation Method</strong>  {{ $project->floorAreaCalcMethod}}
    </div>

{{$predevFuelusagebytype }}
 {{$forecastFuelusagebytype}}
  {{$measuredFuelusagebytype }}
</div>

 <project-chart></project-chart>
   


  </div>
  <h4 class="mt-3"><a href="/" title="all Projects"><i class="fas fa-arrow-circle-left mr-3"></i>Show all Projects</a></h4>

  </div>

</div>
@endsection
