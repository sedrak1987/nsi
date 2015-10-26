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
    <a class="btn btn-success" href="{{ route('admin.accounts.create') }}">Create New</a>
    <a class="btn btn-default" href="{{ route('admin.index') }}">Back</a>
    @if($accounts->isEmpty())
        <div class="page-header">
            <h1>No accounts to show</h1>
        </div>

    @else

        <div class="page-header">
            <h1>Accounts</h1>


        </div>

<div class="container-fluid cont_width">
        <div class="table-responsive " >
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Email</th>
                    <th>Password of email</th>
                    <th>Skype</th>
                    <th>Password of skype</th>
                    <th>Odesk</th>
                    <th>Password of odesk</th>
                    <th>Has work?</th>
                    <th>Project name</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th class="text-right">OPTIONS</th>
                </tr>
                </thead>

                <tbody>

                @foreach($accounts as $account)
                    <tr>

                        <td>{{$account->email}}</td>
                        <td>{{$account->email_password}}</td>
                        <td>{{$account->skype}}</td>
                        <td>{{$account->skype_password}}</td>
                        <td>{{$account->odesk}}</td>
                        <td>{{$account->odesk_password}}</td>
                        <td>{{$account->has_work}}</td>
                        <td>{{$projects[$account->project_id]}}</td>
                        <td>{{$account->created_at}}</td>
                        <td>{{$account->updated_at}}</td>


                        <td class="text-right">
                            <a class="" href="{{ route('admin.accounts.show', $account->id) }}"><span
                                        class="glyphicon glyphicon-eye-open"></span></a>
                            <a href="{{ route('admin.accounts.edit', $account->id) }}"><span
                                        class="glyphicon glyphicon-pencil"></span></a>


                            <form action="{{ route('admin.accounts.destroy', $account->id) }}" method="POST"
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
        {!! $accounts->render() !!}
    @endif
@stop