@extends('adminlte::page')

@section('content')
    <section class="content-header col-md-offset-4">
        <div class="content-header">
            <h1>Auto Toevoegen</h1>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="box box-default">
                    <div class="box-body">

                        {!! Form::model($car,['method' => 'PATCH', 'action' => ['CarController@update', $car->id]]) !!}
                        {{--{!! Form::open(array('url' => '/cars'))!!}--}}
                        {!! csrf_field() !!}

                        <div class="form-group has-feedback {{ $errors->has('license_plate') ? 'has-error' : '' }}">
                            {!! Form::text('license_plate', null, ['class' => 'form-control']) !!}
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            @if ($errors->has('license_plate'))
                                <span class="help-block">
                            <strong>{{ $errors->first('license_plate') }}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback {{ $errors->has('brand') ? 'has-error' : '' }}">
                            {!! Form::text('brand', null, ['class' => 'form-control']) !!}
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            @if ($errors->has('brand'))
                                <span class="help-block">
                            <strong>{{ $errors->first('brand') }}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback {{ $errors->has('type') ? 'has-error' : '' }}">
                            {!! Form::text('type', null, ['class' => 'form-control']) !!}
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            @if ($errors->has('type'))
                                <span class="help-block">
                            <strong>{{ $errors->first('type') }}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback {{ $errors->has('price') ? 'has-error' : '' }}">
                            {!! Form::text('price', null, ['class' => 'form-control']) !!}
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            @if ($errors->has('price'))
                                <span class="help-block">
                            <strong>{{ $errors->first('price') }}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback {{ $errors->has('class') ? 'has-error' : '' }}">
                            {!! Form::text('class', null, ['class' => 'form-control']) !!}
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            @if ($errors->has('class'))
                                <span class="help-block">
                            <strong>{{ $errors->first('class') }}</strong>
                        </span>
                            @endif
                        </div>
                        {{--<div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">--}}
                        {{--<input type="password" name="password_confirmation" class="form-control"--}}
                        {{--placeholder="{{ 'Nieuw ' . trans('adminlte::adminlte.retype_password') }}">--}}
                        {{--<span class="glyphicon glyphicon-log-in form-control-feedback"></span>--}}
                        {{--@if ($errors->has('password_confirmation'))--}}
                        {{--<span class="help-block">--}}
                        {{--<strong>{{ $errors->first('password_confirmation') }}</strong>--}}
                        {{--</span>--}}
                        {{--@endif--}}
                        {{--</div>--}}

                        <div class="form-group has-feedback {{ $errors->has('description') ? 'has-error' : '' }}">
                            {!! Form::text('description', null, ['class' => 'form-control']) !!}
                            <span class="glyphicon glyphicon-h ome form-control-feedback"></span>
                            @if ($errors->has('description'))
                                <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback {{ $errors->has('description') ? 'has-error' : '' }}">
                            GPS: {{ Form::checkbox('GPS', 1, ['class' => 'form-control'])}}
                            <span class="glyphicon glyphicon-h ome form-control-feedback"></span>
                            @if ($errors->has('description'))
                                <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                            @endif
                        </div>


                        <button type="submit"
                                class="btn btn-primary btn-block btn-flat"
                        >{{ 'Opslaan' }}</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection