@extends('admin.app')

@section('content')
    <div class="page-header">
        <h1>Project / Show </h1>
    </div>


    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>

                    <p class="form-control-static">{{$project->id}}</p>
                </div>
                <div class="form-group">
                    <label for="code">Project name</label>

                    <p class="form-control-static">{{$project->project_name}}</p>
                </div>

                <div class="form-group">
                    <label for="name">Status</label>

                    <p class="form-control-static">{{$project->status}}</p>
                </div>





            </form>


            <a class="btn btn-default" href="{{ route('admin.projects.index') }}">Back</a>
            <a class="btn btn-warning" href="{{ route('admin.projects.edit', $project->id) }}">Edit</a>

            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST"
                  style="display: inline;"
                  onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                <input type="hidden" name="_method" value="DELETE"><input type="hidden"
                                                                          name="_token"
                                                                          value="{{ csrf_token() }}">

                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </div>
    </div>


@endsection