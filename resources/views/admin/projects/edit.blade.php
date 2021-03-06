@extends('admin.app')

@section('content')
    <div class="page-header">
        <h1>Project / Edit </h1>
    </div>

    @if(!$errors->isEmpty())
        <div class = "alert alert-error jumbotron project_error">
            <ul>
                @foreach ($errors->all('<p>:message</p>') as $error)
                    <li> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="row">


            <form action="{{ route('admin.projects.update', $project->id) }}" method="POST"class="form-horizontal">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">


                <div class="form-group">
                     <label for="project_name" class="control-label col-md-2">Project name</label>
                    <div class="col-md-10">
                     <input type="text" name="project_name" class="form-control" value="{{$project->project_name}}"/>
                        </div>
                </div>
                <div class="form-group">
                    <label for="sel1" class="control-label col-md-2">Status (select one):</label>
                    <div class="col-md-10">
                    <select class="selectpicker col-md-5" id="sel1" name="status">

                        <option value="current" <?php if ($project->status=='current') { echo 'selected'; } ?>>Current</option>
                        <option value="new"  <?php if ($project->status=='new') { echo 'selected'; } ?>>New</option>
                        <option value="finished" <?php if ($project->status=='finished') { echo 'selected'; } ?>>Finished</option>
                    </select>
                    </div>
                </div>




            <a class="btn btn-default" href="{{ route('admin.projects.index') }}">Back</a>
            <button class="btn btn-primary" type="submit" >Save</button>
            </form>

    </div>


@stop