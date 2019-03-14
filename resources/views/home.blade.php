@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-left">
        <div class="col-md-8">

                <h2>Projects ({{ Auth::user()->name }})</h2>



                    @if ($flash=session('message'))
                    <div id="flash-message" class="alert alert-success">
                        {{ $flash }}
                    </div>
                    @endif

                    @if (count($projects)==0)
                    <h6> No Saved Projects Yet</h6>
                    @else


                    @foreach ($projects as $project)

                    <?php
                  if (!empty($project->projectThumb)) {
                      $pimg=asset('storage/images/'.$project->projectThumb);
                    } else{
                        $pimg='storage/images/default.png';
                    }
                    ?>
                    <div class="media mb-3 box">
                      <img src="<?php echo $pimg;?>" class="mr-3" width="128">
                      <div class="media-body">
                      <h4 class="mt-0"> {{ $project->projectName }} </h4>
                      <div class="mb-2">
                        {{ $project->shortDescription }}
                      </div>
                      <div>  <a href='/projects/{{$project->id}}/edit' class="btn btn-primary mb-3"> Edit <i class="fas fa-edit ml-3"> </i> </a>

                        <form method="POST" action="/projects/{{$project->id}}/delete" class="form-horizontal">
                            @method('DELETE')
                            @csrf
                            <div class="form-group">
                             <input type="submit" name="Delete" value="Delete &#8855; " class="btn btn-outline-danger">
                            </div>
                        </form>
                      </div>
                    </div>
                    <hr>
                    </div>
                    @endforeach
                    @endif


        </div>



        <div class="col-md-4">
            <div class="container">
                <h3>Sidebar</h3>
                <div class="ml-3">

                    <a class="btn btn-primary" href="{{ route('projects.create') }}">Create Project <i class="fas fa-edit"></i></a>

                </div>



                <div id="sim" class="ml-3">
                    "*"
                </div>






            </div>
        </div>
    </div>

</div>


<script type="text/javascript">
    $(document).ready(function() {
        console.log('JQUERY loaded');
        $('#sim').html("<p>Hello jQuery!</p>");
    });
</script>
@endsection
