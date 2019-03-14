@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-8 blog-main">
    <h1>Edit project</h1>
    @php
    $ukcountryArr=['England'=>'England','Scotland'=>'Scotland','Wales'=>'Wales','Northern Ireland'=>'Northern Ireland'];
    $ukcountiesArr  = [ 'Alderney'=>'Alderney','County Antrim'=>'County Antrim','County Armagh'=>'County Armagh','Bristol'=>'Bristol','Bedfordshire'=>'Bedfordshire','Berkshire'=>'Berkshire',
    'Blaenau Gwent'=>'Blaenau Gwent','Borders'=>'Borders','Bridgend'=>'Bridgend','Buckinghamshire'=>'Buckinghamshire','Caerphilly'=>'Caerphilly','Caithness'=>'Caithness',
    'Cambridgeshire'=>'Cambridgeshire','Cardiff'=>'Cardiff','Carmarthenshire'=>'Carmarthenshire','Central'=>'Central','Ceredigion'=>'Ceredigion','Cheshire'=>'Cheshire' ,
    'Channel Islands'=>'Channel Islands','Clwyd'=>'Clwyd','Conway'=>'Conway','Cornwall'=>'Cornwall','Cumbria'=>'Cumbria','Denbighshire'=>'Denbighshire','Derbyshire'=>'Derbyshire',
    'Devon'=>'Devon','Dorset'=>'Dorset','County Down'=>'County Down','Dumfries & Galloway'=>'Dumfries & Galloway','County Durham'=>'County Durham' ,'Dyfed'=>'Dyfed','Essex'=>'Essex',
    'East Sussex'=>'East Sussex','Fermanagh'=>'Fermanagh','Fife'=>'Fife','Flintshire'=>'Flintshire','Glamorgan'=>'Glamorgan','Gloucestershire'=>'Gloucestershire','Grampian'=>'Grampian',
    'Guernsey'=>'Guernsey','Gwent'=>'Gwent','Gwynedd'=>'Gwynedd','Hampshire'=>'Hampshire','Herefordshire'=>'Herefordshire','Hertfordshire'=>'Hertfordshire',
    'East Riding of Yorkshire'=>'East Riding of Yorkshire','Isle of Anglesey'=>'Isle of Anglesey','Isle of Man'=>'Isle of Man','Isle of Wight'=>'Isle of Wight','Jersey'=>'Jersey','Kent'=>'Kent',
    'Lancashire'=>'Lancashire','Londonderry'=>'Londonderry','Leicestershire'=>'Leicestershire','Lincolnshire'=>'Lincolnshire','London'=>'London','Lothian'=>'Lothian','Manchester'=>'Manchester',
    'Merseyside'=>'Merseyside','Middlesex'=>'Middlesex','Merthyr Tydfil'=>'Merthyr Tydfil','Monmouthshire'=>'Monmouthshire','Neath Port Talbot'=>'Neath Port Talbot','Newport'=>'Newport',
    'Northamptonshire'=>'Northamptonshire','Norfolk'=>'Norfolk','Nottinghamshire'=>'Nottinghamshire','Northumberland'=>'Northumberland','North west Highlands'=>'North west Highlands',
    'North Yorkshire'=>'North Yorkshire','Oxfordshire'=>'Oxfordshire','Pembrokeshire'=>'Pembrokeshire','Powys'=>'Powys','Shropshire'=>'Shropshire','Somerset'=>'Somerset','Staffordshire'=>'Staffordshire',
    'Strathclyde'=>'Strathclyde','Suffolk'=>'Suffolk','Surrey'=>'Surrey','Swansea'=>'Swansea','South Yorkshire'=>'South Yorkshire','South Ayrshire'=>'South Ayrshire',
    'Rhondda Cynon Taff'=>'Rhondda Cynon Taff','Tayside'=>'Tayside','Torfaen'=>'Torfaen','County Tyrone'=>'County Tyrone','Tyne & Wear'=>'Tyne & Wear','Vale of Glamorgan'=>'Vale of Glamorgan',
    'Worcestershire'=>'Worcestershire','Warwickshire'=>'Warwickshire','Wiltshire'=>'Wiltshire','West Isles'=>'West Isles','Wrexham'=>'Wrexham','West Midlands'=>'West Midlands',
    'West Sussex'=>'West Sussex','West Yorkshire'=>'West Yorkshire'] ;
    $ENERGYSTANDARDSArr=array("2002 Building Regs"=>'2002 Building Regs',"2006 Building Regs"=>'2006 Building Regs',"AECB Silver"=>'AECB Silver',"AECB Gold"=>'AECB Gold',
    "PassivHaus"=>'PassivHaus',"EnerPHit"=>'EnerPHit',"CSH 3"=>'CSH 3',"CSH 4"=>'CSH 4',"CSH 5"=>'CSH 5',"CSH 6"=>'CSH 6',"R-2000"=>'R-2000', "Minergie"=>'Minergie', "Minergie Eco"=>'Minergie Eco',
     "Minergie P"=>'Minergie P',"Minergie P Eco"=>'Minergie P Eco',"Retrofit for the Future"=>'Retrofit for the Future"',"other"=>'other');
    $PROPERTYTYPEArr=array("Detached"=>'Detached',"Semi-Detached"=>'Semi-Detached',"End Terrace"=>'End Terrace',"Mid Terrace"=>'Mid Terrace');
    $CONSTRUCTIONTYPEArr=array('Stone'=>'Stone','Solid Brick'=>'Solid Brick','Masonry Cavity'=>'Masonry Cavity','Oak frame'=>'Oak frame','Softwood frame'=>'Softwood frame',
    'Steel frame'=>'Steel frame', 'Concrete frame'=>'Concrete frame','Other'=>'Other');
    $BUILDINGSECTORArr=array("Private Residential"=>'Private Residential',"Public Residential"=>'Public Residential',"Public"=>'Public',"Commercial"=>'Commercial',
    "Mixed-use"=>'Mixed-use',"Industrial"=>'Industrial');
    $BUILDTYPEArr=array("New build"=>'New build',"Refurbishment"=>'Refurbishment',"Mixed"=>'Mixed');
    $FLOORAREACALCArr=array('PHPP'=>'PHPP','SAP'=>'SAP','Approx'=>'Approx');
    @endphp



    <form class="form-horizontal" action="/projects/{{$project->id}}" method="post">
        @method('PATCH')
          @csrf
      @include('layouts.errors')
      @include ('projects.projectForm', ['submitButtonText' => 'Update Project'])
  </div>
</div>
@endsection
