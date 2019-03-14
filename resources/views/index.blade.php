@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">

        <div class="filterbox">
            <h4>Filters</h4>
        </div>

    </div>

<div class="row">
    @foreach($projects as $project)
    <?php $rand='https://loremflickr.com/320/240/building?random='.rand(); //temp images
    if (!empty($project->projectThumb)) {
        $imgpath=asset('storage/images/'.$project->projectThumb);
        } else {
          $imgpath =$rand;
        }
      ?>
    <div class="col-md-4">
        <div class="card  mb-4 ">
          <img class="card-img-top flex-auto d-none d-lg-block"  src="<?php echo $imgpath;?>" alt="Card image">
            <div class="card-body d-flex flex-column align-items-start">
                <h3 class="mb-0">
                    <a class="text-dark" href="/projects/{{$project->id}}">{{$project->projectName }}</a>
                </h3>


                <div class="mb-1  align-items-center ">
                  <a href="mailto:{{$project->owner->email}}">{{$project->owner->name}} <i class="fas fa-envelope"></i></a>

                <span class="ml-4 text-muted">{{$project->created_at->toFormattedDateString() }}</span>
                </div>
                <p class="card-text mb-auto">{{ $project->shortDescription }}</p>
              <div class="mt-4">
                 <a href="/projects/{{$project->id}}" class="btn btn-outline-info" role="button">see more</a>
              </div>
            </div>

        </div>
    </div>
    @endforeach
</div>
{{ $projects->links() }}
</div>
@endsection
