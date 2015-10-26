@extends('admin.app')
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>
                <i class="fa fa-check-circle fa-lg fa-fw"></i>  &nbsp;
            </strong>
            {{ Session::get('message') }}
        </div>
    @endif
    <a class="btn btn-success" href="{{ route('admin.projects.create') }}">Create New</a>
    <a class="btn btn-default" href="{{ route('admin.index') }}">Back</a>
    @if($projects->isEmpty())
        <div class="page-header">
            <h1>No projects to show</h1>
        </div>

    @else

        <div class="page-header">
            <h1>Projects</h1>



        </div>

<div class="container-fluid cont_width">
        <div class="table-responsive " >
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Project name</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th class="text-right">OPTIONS</th>
                </tr>
                </thead>

                <tbody>

                @foreach($projects as $project)
                    <tr>

                        <td>{{$project->project_name}}</td>
                        <td>{{$project->status}}</td>
                        <td>{{$project->created_at}}</td>
                        <td>{{$project->updated_at}}</td>


                        <td class="text-right">
                            <a class="" href="{{ route('admin.projects.show', $project->id) }}"><span
                                        class="glyphicon glyphicon-eye-open"></span></a>
                            <a href="{{ route('admin.projects.edit', $project->id) }}"><span
                                        class="glyphicon glyphicon-pencil"></span></a>


                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST"
                                  style="display: inline;"
                                  onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                <input type="hidden" name="_method" value="DELETE"><input type="hidden"
                                                                                          name="_token"
                                                                                          value="{{ csrf_token() }}">

                                <button class="ion-del" type="submit">   <i class="ion ion-ios-close-outline" ></i>
                                </button>

                            </form>
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>


        </div>
</div>
        {!! $projects->render() !!}
    @endif
@stop