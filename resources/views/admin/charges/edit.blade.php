@extends('admin.app')

@section('content')
    <div class="page-header">
        <h1>Charge / Edit </h1>
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


            <form action="{{ route('admin.charges.update', $charge->id) }}" method="POST"class="form-horizontal">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label for="income_date" class="control-label col-md-2">Date</label>
                    <div class="col-md-10">
                          {!!  Form::date('income_date', \Carbon\Carbon::now()) !!}
                    </div>
                </div>
                <div class="form-group">
                     <label for="amount" class="control-label col-md-2">Amount</label>
                    <div class="col-md-10">
                        {!! Form::number('amount', $charge->amount,array('class'=>'form-control','min'=>'1')) !!}
                        </div>
                </div>
                <div class="form-group">
                    <label for="reason" class="control-label col-md-2">Reason</label>
                    <div class="col-md-10">
                        <textarea name="reason" id="reason" class="col-md-5" rows="5" >{{$charge->reason}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="sel1" class="control-label col-md-2">Status (select one):</label>
                    <div class="col-md-10">
                    <select class="selectpicker col-md-5" id="sel1" name="status">

                        <option value="income" <?php if ($charge->status=='income') { echo 'selected'; } ?>>Income</option>
                        <option value="spending"  <?php if ($charge->status=='spending') { echo 'selected'; } ?>>Spending</option>
                    </select>
                    </div>
                </div>




            <a class="btn btn-default" href="{{ route('admin.charges.index') }}">Back</a>
            <button class="btn btn-primary" type="submit" >Save</button>
            </form>

    </div>


@stop