@extends('admin.app')

@section('content')
    <div class="page-header">
        <h1 class="marg_left">Account / Create </h1>
    </div>
    @if(!$errors->isEmpty())
        <div class="alert alert-error jumbotron account_error">
            <ul>
                @foreach ($errors->all('<p>:message</p>') as $error)
                    <li> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <?php
   // var_dump($projects);die;
    ?>
    <div class="row">


        <form action="{{ route('admin.accounts.store') }}" method="POST" class="form-horizontal">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label for="email" class="control-label col-md-2">Email</label>

                <div class="col-md-10">
                    <input type="email" name="email" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="email_password" class="control-label col-md-2">Password of Email</label>

                <div class="col-md-10">
                    <input type="text" name="email_password" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="skype" class="control-label col-md-2">Skype</label>

                <div class="col-md-10">
                    <input type="text" name="skype" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="skype_password" class="control-label col-md-2">Password of Skype</label>

                <div class="col-md-10">
                    <input type="text" name="skype_password" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="odesk" class="control-label col-md-2">Odesk</label>

                <div class="col-md-10">
                    <input type="text" name="odesk" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="odesk_password" class="control-label col-md-2">Password of Odesk</label>

                <div class="col-md-10">
                    <input type="text" name="odesk_password" class="form-control"/>
                </div>
            </div>


            <div class="form-group">
                <label for="has_work" class="control-label col-md-2">Has work? (select one):</label>

                <div class="col-md-10">
                    <select class="selectpicker col-md-5" id="has_work" name="has_work">
                        <option value="free" class="form-control">Free</option>
                        <option value="busy" class="form-control">Busy</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="project" class="control-label col-md-2">What project? (select one):</label>

                <div class="col-md-10">
                    <select class="selectpicker col-md-5" id="project" name="project">
                        <?php
                        foreach($projects as $key => $value){ ?>
                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="col-md-4 col-md-offset-5">
            <a class="btn btn-default" href="{{ route('admin.accounts.index') }}">Back</a>
            <button class="btn btn-primary" type="submit">Create</button>
            </div>
        </form>

    </div>


@endsection