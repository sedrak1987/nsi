@extends('admin.app')

@section('content')
    <div class="page-header">
        <h1>Charge / Show </h1>
    </div>


    <div class="row">
        <div class="col-md-12">

            <form action="#">

                <div class="form-group">
                    <label for="code">Amount</label>

                    <p class="form-control-static">{{$charge->amount}}</p>
                </div>
                <div class="form-group">
                    <label for="code">Reason</label>

                    <p class="form-control-static">{{$charge->reason}}</p>
                </div>

                <div class="form-group">
                    <label for="name">Status</label>

                    <p class="form-control-static">{{$charge->status}}</p>
                </div>





            </form>


            <a class="btn btn-default" href="{{ route('admin.charges.index') }}">Back</a>
            <a class="btn btn-warning" href="{{ route('admin.charges.edit', $charge->id) }}">Edit</a>

            <form action="{{ route('admin.charges.destroy', $charge->id) }}" method="POST"
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