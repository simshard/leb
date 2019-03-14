<fieldset>
  <div class="form-group">
    <label for="projectName">Project Name</label>
      <input required="required" name="projectName" type="text" id="projectName" class="form-control col-md-6 {{ $errors->has('projectName')?'is-invalid':'' }}" value="{{old('projectName',$project->projectName)}}" >
   </div>

<div class="form-group">
  <label for="shortDescription">Short Description of building project</label>
   <textarea aria-describedby="sDescHelpBlock" rows="2" name="shortDescription" cols="50" id="shortDescription" class="form-control col-md-6 {{ $errors->has('shortDescription')?'is-invalid':''}}">{{old('shortDescription',$project->shortDescription)}}</textarea>
    <small id="sDescHelpBlock" class="form-text text-muted">
 Please enter a  brief project description
</small>
</div>

<div class="form-group">
    <label for="projectLocation">Project Town/City</label>
    <input required="required" name="projectLocation" type="text" id="projectLocation" class="form-control col-md-6 {{ $errors->has('projectLocation')?'is-invalid':'' }}" value="{{old('projectLocation',$project->projectLocation)}}" >
</div>

<div class="form-group">
  <label for="projectCounty">Project County </label>
  <select required="required" id="projectCounty" name="projectCounty" class="form-control  col-md-6 {{ $errors->has('projectCounty')?'is-invalid':'' }}">
    <option value="">Please select UK county...</option>
    @foreach($ukcountiesArr as $ukcounty)
         <option value="{{$ukcounty}}"  {{$ukcounty==old('projectCounty',$project->projectCounty)?'selected':''}}>
           {{$ukcounty}}
         </option>
    @endforeach
  </select>
</div>

<div class="form-group">
  <label for="projectCountry">Project Country</label>
  <select required="required" id="projectCountry" name="projectCountry" class="form-control  col-md-6">
    <option value="">Please select UK country...</option>
    @foreach($ukcountryArr as $ukcountry)
      <option value="{{$ukcountry}}" {{$ukcountry==old('projectCountry',$project->projectCountry)?'selected':''}}>{{$ukcountry}}</option>
    @endforeach
  </select>
</div>

<div class="form-group">
  <label for="energyStandard">Energy Standard</label>
  <select required="required" id="energyStandard" name="energyStandard" class="form-control  col-md-6">
    <option value="">Please select Energy Standard...</option>
    @foreach($ENERGYSTANDARDSArr as $energyStandard)
      <option value="{{$energyStandard}}" {{ $energyStandard==old('energyStandard',$project->energyStandard) ? 'selected' : '' }}>{{$energyStandard}}</option>
    @endforeach
  </select>
 </div>

<div class="form-group">
  <label for="alt_energyStandard">Other Energy Standard</label>

    <input type="text" name="alt_energyStandard"  class="form-control  col-md-6 {{ $errors->has('alt_energyStandard')?'is-invalid':'' }}" value="{{old('alt_energyStandard',$project->alt_energyStandard)}}" aria-describedby="altEsHelpBlock"  >
 <small id="altEsHelpBlock" class="form-text text-muted">
  If you selected <em>Other</em> for energy standard -please describe  it here.
</small>
</div>

<div class="form-group">
  <label for="buildType">Build Type</label>
  <select required="required" id="buildType" name="buildType" class="form-control  col-md-6 {{ $errors->has('buildType')?'is-invalid':'' }}">
    <option value="">Please select Build Type...</option>
    @foreach($BUILDTYPEArr as $buildType)
      <option value="{{$buildType}}" {{  $buildType==old('buildType',$project->buildType) ? 'selected' : '' }}>{{$buildType}}</option>
    @endforeach
  </select>
 </div>

<div class="form-group">
  <label for="buildingSector">Building Sector</label>
  <select required="required" id="buildingSector" name="buildingSector" class="form-control  col-md-6 {{ $errors->has('buildingSector')?'is-invalid':'' }}">
    <option value="">Please select building sector....</option>
    @foreach($BUILDINGSECTORArr as $buildingSector)
      <option value="{{$buildingSector}}" {{$buildingSector==old('buildingSector',$project->buildingSector) ? 'selected' : '' }}>{{$buildingSector}}</option>
    @endforeach
  </select>
 </div>

<div class="form-group">
  <label for="propertyType">Property Type</label>
  <select required="required" id="propertyType" name="propertyType" class="form-control  col-md-6 {{ $errors->has('propertyType')?'is-invalid':'' }}">
    <option value="">Please select Property Type...</option>
    @foreach($PROPERTYTYPEArr as $propertyType)
      <option value="{{$propertyType }}" {{old('propertyType',$project->propertyType) == $propertyType  ? 'selected' : '' }}>{{$propertyType }}</option>
    @endforeach
  </select>
 </div>

<div class="form-group">
<label for="constructionType">Construction Type</label>
<select required="required" id="constructionType" name="constructionType" class="form-control  col-md-6 {{ $errors->has('constructionType')?'is-invalid':'' }}">
  <option value="">Please select ...</option>
  @foreach($CONSTRUCTIONTYPEArr as $constructionType)
    <option value="{{$constructionType}}" {{ old('constructionType',$project->constructionType) == $constructionType ? 'selected' : '' }}>{{$constructionType}}</option>
  @endforeach
</select>
 </div>

<div class="form-group">
  <label for="alt_constructionType">Other Construction Type</label>
        <input type="text" name="alt_constructionType" id="alt_constructionType"  class="form-control  col-md-6 {{ $errors->has('alt_constructionType')?'is-invalid':'' }}" value="{{old('alt_constructionType',$project->alt_constructionType)}} " aria-describedby="altCtHelpBlock"  >
 <small id="altCtHelpBlock" class="form-text text-muted">
  If you selected <em>Other</em> for construction type -please describe  it here.
</small>
</div>

<div class="form-group">
  <label for="floorArea">Floor Area (m²)</label>
  <input  name="floorArea" type="text" id="floorArea" class="form-control col-md-6 {{ $errors->has('floorArea')?'is-invalid':'' }}" value="{{old('floorArea',$project->floorArea)}}" required="required">
</div>

<div class="form-group">
  <label for="floorAreaCalcMethod">Floor Area Calculation method </label>
  <select required="required" id="floorAreaCalcMethod" name="floorAreaCalcMethod" class="form-control  col-md-6 {{ $errors->has('floorAreaCalcMethod')?'is-invalid':'' }}">
    <option value="">Please select Floor Area Calculation Method...</option>
    @foreach($FLOORAREACALCArr as $floorAreaCalcMethod)
      <option value="{{$floorAreaCalcMethod}}" {{ old('floorAreaCalcMethod',$project->floorAreaCalcMethod)==$floorAreaCalcMethod ?'selected':''}}>{{$floorAreaCalcMethod}}</option>
    @endforeach
  </select>
 </div>



 <div class="form-group">
   <label for="electric_predev_fuelUse">Pre-refurbishment annual electric fuelUse (kWh/yr)</label>
   <input  name="electric_predev_fuelUse" type="text" id="electric_predev_fuelUse" class="form-control col-md-6 {{ $errors->has('electric_predev_fuelUse')?'is-invalid':'' }}" value="{{old('electric_predev_fuelUse',$project->electric_predev_fuelUse)}}">
 </div>

 <div class="form-group">
   <label for="gas_predev_fuelUse">Pre-refurbishment annual gas fuelUse (kWh/yr)</label>
   <input  name="gas_predev_fuelUse" type="text" id="gas_predev_fuelUse" class="form-control col-md-6 {{ $errors->has('gas_predev_fuelUse')?'is-invalid':'' }}" value="{{old('gas_predev_fuelUse',$project->gas_predev_fuelUse)}}">
 </div>

 <div class="form-group">
   <label for="oil_predev_fuelUse">Pre-refurbishment annual oil fuelUse (kWh/yr)</label>
   <input  name="oil_predev_fuelUse" type="text" id="oil_predev_fuelUse" class="form-control col-md-6 {{ $errors->has('oil_predev_fuelUse')?'is-invalid':'' }}" value="{{old('oil_predev_fuelUse',$project->oil_predev_fuelUse)}}">
 </div>

 <div class="form-group">
   <label for="lpg_predev_fuelUse">Pre-refurbishment annual lpg fuelUse (kWh/yr)</label>
   <input  name="lpg_predev_fuelUse" type="text" id="lpg_predev_fuelUse" class="form-control col-md-6 {{ $errors->has('lpg_predev_fuelUse')?'is-invalid':'' }}" value="{{old('lpg_predev_fuelUse',$project->lpg_predev_fuelUse)}}">
 </div>

 <div class="form-group">
   <label for="wood_predev_fuelUse">Pre-refurbishment annual Solid Fuel &amp; Wood fuelUse (kWh/yr)</label>
   <input  name="wood_predev_fuelUse" type="text" id="wood_predev_fuelUse" class="form-control col-md-6 {{ $errors->has('wood_predev_fuelUse')?'is-invalid':'' }}" value="{{old('wood_predev_fuelUse',$project->wood_predev_fuelUse)}}">
 </div>





  <div class="form-group">
    <label for="electric_forecast_fuelUse">Forecast annual electric fuelUse (kWh/yr)</label>
    <input  name="electric_forecast_fuelUse" type="text" id="electric_forecast_fuelUse" class="form-control col-md-6 {{ $errors->has('electric_forecast_fuelUse')?'is-invalid':'' }}" value="{{old('electric_forecast_fuelUse',$project->electric_forecast_fuelUse)}}">
  </div>

  <div class="form-group">
    <label for="gas_forecast_fuelUse">Forecast annual gas fuelUse (kWh/yr)</label>
    <input  name="gas_forecast_fuelUse" type="text" id="gas_forecast_fuelUse" class="form-control col-md-6 {{ $errors->has('gas_forecast_fuelUse')?'is-invalid':'' }}" value="{{old('gas_forecast_fuelUse',$project->gas_forecast_fuelUse)}}">
  </div>

  <div class="form-group">
    <label for="oil_forecast_fuelUse">Forecast annual oil fuelUse (kWh/yr)</label>
    <input  name="oil_forecast_fuelUse" type="text" id="oil_fuelUse" class="form-control col-md-6 {{ $errors->has('oil_forecast_fuelUse')?'is-invalid':'' }}" value="{{old('oil_forecast_fuelUse',$project->oil_forecast_fuelUse)}}">
  </div>

  <div class="form-group">
    <label for="lpg_forecast_fuelUse">Forecast annual lpg fuelUse (kWh/yr)</label>
    <input  name="lpg_forecast_fuelUse" type="text" id="lpg_fuelUse" class="form-control col-md-6 {{ $errors->has('lpg_forecast_fuelUse')?'is-invalid':'' }}" value="{{old('lpg_forecast_fuelUse',$project->lpg_forecast_fuelUse)}}">
  </div>

  <div class="form-group">
    <label for="wood_forecast_fuelUse">Forecast annual Solid Fuel &amp; Wood fuelUse (kWh/yr)</label>
    <input  name="wood_forecast_fuelUse" type="text" id="wood_forecast_fuelUse" class="form-control col-md-6 {{ $errors->has('wood_forecast_fuelUse')?'is-invalid':'' }}" value="{{old('wood_forecast_fuelUse',$project->wood_forecast_fuelUse)}}">
  </div>




 <div class="form-group">
   <label for="electric_fuelUse">Measured annual electric fuelUse (kWh/yr)</label>
   <input  name="electric_fuelUse" type="text" id="electric_fuelUse" class="form-control col-md-6 {{ $errors->has('electric_fuelUse')?'is-invalid':'' }}" value="{{old('electric_fuelUse',$project->electric_fuelUse)}}">
 </div>

 <div class="form-group">
   <label for="gas_fuelUse">Measured annual gas fuelUse (kWh/yr)</label>
   <input  name="gas_fuelUse" type="text" id="gas_fuelUse" class="form-control col-md-6 {{ $errors->has('gas_fuelUse')?'is-invalid':'' }}" value="{{old('gas_fuelUse',$project->gas_fuelUse)}}">
 </div>

 <div class="form-group">
   <label for="oil_fuelUse">Measured annual oil fuelUse (kWh/yr)</label>
   <input  name="oil_fuelUse" type="text" id="oil_fuelUse" class="form-control col-md-6 {{ $errors->has('oil_fuelUse')?'is-invalid':'' }}" value="{{old('oil_fuelUse',$project->oil_fuelUse)}}">
 </div>

 <div class="form-group">
   <label for="lpg_fuelUse">Measured annual lpg fuelUse (kWh/yr)</label>
   <input  name="lpg_fuelUse" type="text" id="lpg_fuelUse" class="form-control col-md-6 {{ $errors->has('lpg_fuelUse')?'is-invalid':'' }}" value="{{old('lpg_fuelUse',$project->lpg_fuelUse)}}">
 </div>

 <div class="form-group">
   <label for="wood_fuelUse">Measured annual Solid Fuel &amp; Wood fuelUse (kWh/yr)</label>
   <input  name="wood_fuelUse" type="text" id="wood_fuelUse" class="form-control col-md-6 {{ $errors->has('wood_fuelUse')?'is-invalid':'' }}" value="{{old('wood_fuelUse',$project->wood_fuelUse)}}">
 </div>


  <div class="form-group">
    <label for="annualHeatReq">Annual Heat Requirement (kWh/m&#178;.yr) </label>
    <input  name="annualHeatReq" type="text" id="annualHeatReq" class="form-control col-md-6 {{ $errors->has('annualHeatReq')?'is-invalid':'' }}" value="{{old('annualHeatReq',$project->annualHeatReq)}}">
  </div>

  <div class="form-group">
    <label for="heatLoad">Heat Load (W/m&#178;)</label>
    <input  name="heatLoad" type="text" id="heatLoad" class="form-control col-md-6 {{ $errors->has('heatLoad')?'is-invalid':'' }}" value="{{old('heatLoad',$project->heatLoad)}}">
  </div>


<!--
<div class="form-group">
<label for="images[]"> Product images (can add more than one):</label>

    <input type="file" id="fileupload" name="images[]" data-url="/uploadfile" multiple />
    <br />
    <div id="files_list"></div>
    <p id="loading"></p>
    <input type="hidden" name="file_ids" id="file_ids" value="" />
</div> -->

<div class="form-group">
  <button type="submit" name="submit"  class=" btn btn-primary btn-info">
    {{ $submitButtonText ?? 'Create Project' }}
</button>
 </div>
</fieldset>

<!--
<script>
    $(function () {
        $('#fileupload').fileupload({
            dataType: 'json',
            add: function (e, data) {
                $('#loading').text('Uploading...');
                data.submit();
            },
            done: function (e, data) {
                $.each(data.result.files, function (index, file) {
                    $('<p/>').html(file.name + ' (' + file.size + ' KB)').appendTo($('#files_list'));
                    if ($('#file_ids').val() != '') {
                        $('#file_ids').val($('#file_ids').val() + ',');
                    }
                    $('#file_ids').val($('#file_ids').val() + file.fileID);
                });
                $('#loading').text('');
            }
        });
    });
</script>-->


<script>
    // console.log('JQUERY not yet loaded');
   jQuery(document).ready(function(){
     console.log('JQUERY loaded');
  });
</script>
