@extends('admin.app')

@section('content')
    <div class="page-header">
        <h1>Account / Edit </h1>
    </div>

    @if(!$errors->isEmpty())
        <div class = "alert alert-error jumbotron account_error">
            <ul>
                @foreach ($errors->all('<p>:message</p>') as $error)
                    <li> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('admin.accounts.update', $account->id) }}" method="POST"  class="form-horizontal">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">


                <div class="form-group">
                    <label for="email" class="control-label col-md-2">Email</label>

                    <div class="col-md-10">
                        <input type="email" name="email" class="form-control" value="{{$account->email}}"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="control-label col-md-2">Password of Email</label>

                    <div class="col-md-10">
                        <input type="text" name="email_password" class="form-control" value="{{$account->email_password}}"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="skype" class="control-label col-md-2">Skype</label>

                    <div class="col-md-10">
                        <input type="text" name="skype" class="form-control"  value="{{$account->skype}}"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="skype_password" class="control-label col-md-2">Password of Skype</label>

                    <div class="col-md-10">
                        <input type="text" name="skype_password" class="form-control"  value="{{$account->skype_password}}"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="odesk" class="control-label col-md-2">Odesk</label>

                    <div class="col-md-10">
                        <input type="text" name="odesk" class="form-control" value="{{$account->odesk}}"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="odesk_password" class="control-label col-md-2">Password of Odesk</label>

                    <div class="col-md-10">
                        <input type="text" name="odesk_password" class="form-control" value="{{$account->odesk_password}}"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="has_work" class="control-label col-md-2">Has work? (select one):</label>

                    <div class="col-md-10">
                        <select class="selectpicker col-md-5" id="has_work" name="has_work" value="{{$account->has_work}}">
                            <option value="free" class="form-control" <?php if ($account->has_work=='free') { echo 'selected'; } ?>>Free</option>
                            <option value="busy" class="form-control" <?php if ($account->has_work=='busy') { echo 'selected'; } ?>>Busy</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="project" class="control-label col-md-2">What project? (select one):</label>

                    <div class="col-md-10">
                        <select class="selectpicker col-md-5" id="project" name="project" >
                            <?php

                            foreach($projects as $key => $value){ ?>
                            <option value="<?php echo $key; ?>" <?php if ($key == $account->project_id) { echo 'selected'; } ?> ><?php echo $value; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>





            <a class="btn btn-default" href="{{ route('admin.accounts.index') }}">Back</a>
            <button class="btn btn-primary" type="submit" >Save</button>
            </form>
        </div>
    </div>


@stop