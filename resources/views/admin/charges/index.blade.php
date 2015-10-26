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
    <a class="btn btn-success" href="{{ route('admin.charges.create') }}">Create New</a>
    <a class="btn btn-default" href="{{ route('admin.index') }}">Back</a>
    @if($charges->isEmpty())
        <div class="page-header">
            <h1>No charges to show</h1>
        </div>

    @else

        <div class="page-header">
            <h1>Charges</h1>



        </div>

<div class="container-fluid cont_width">
        <div class="table-responsive " >
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Amount</th>
                    <th>Reason</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Income Date</th>
                    <th class="text-right">OPTIONS</th>
                </tr>
                </thead>

                <tbody>

                @foreach($charges as $charge)
                    <tr>

                        <td>{{$charge->amount}}</td>
                        <td>{{$charge->reason}}</td>
                        <td>{{$charge->status}}</td>
                        <td>{{$charge->created_at}}</td>
                        <td>{{$charge->income_date}}</td>


                        <td class="text-right">
                            <a class="" href="{{ route('admin.charges.show', $charge->id) }}"><span
                                        class="glyphicon glyphicon-eye-open"></span></a>
                            <a href="{{ route('admin.charges.edit', $charge->id) }}"><span
                                        class="glyphicon glyphicon-pencil"></span></a>


                            <form action="{{ route('admin.charges.destroy', $charge->id) }}" method="POST"
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
        {!! $charges->render() !!}
    @endif


@stop
