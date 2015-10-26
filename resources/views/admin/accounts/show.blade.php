@extends('admin.app')

@section('content')
    <div class="page-header">
        <h1>Account / Show </h1>
    </div>


    <div class="row">
        <div class="col-md-12">

            <form action="#">

                <div class="form-group">
                    <label for="email">Email</label>

                    <p class="form-control-static">{{$account->email}}</p>
                </div>
                <div class="form-group">
                    <label for="email">Password of email</label>

                    <p class="form-control-static">{{$account->email_password}}</p>
                </div>
                <div class="form-group">
                    <label for="email">Skype</label>

                    <p class="form-control-static">{{$account->skype}}</p>
                </div>
                <div class="form-group">
                    <label for="email">Password of skype</label>

                    <p class="form-control-static">{{$account->skype_password}}</p>
                </div>
                <div class="form-group">
                    <label for="email">Odesk</label>

                    <p class="form-control-static">{{$account->odesk}}</p>
                </div>
                <div class="form-group">
                    <label for="email">Password of odesk</label>

                    <p class="form-control-static">{{$account->odesk_password}}</p>
                </div>
                <div class="form-group">
                    <label for="email">Has work?</label>

                    <p class="form-control-static">{{$account->has_work}}</p>
                </div>
                <div class="form-group">
                    <label for="email">Project name</label>

                    <p class="form-control-static">{{$projects[$account->project_id]}}</p>
                </div>








            </form>


            <a class="btn btn-default" href="{{ route('admin.accounts.index') }}">Back</a>
            <a class="btn btn-warning" href="{{ route('admin.accounts.edit', $account->id) }}">Edit</a>

            <form action="{{ route('admin.accounts.destroy', $account->id) }}" method="POST"
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