@extends('adminlte::page')

@section('content')
    <section class="content-header">
        <div class="content-header col-md-offset-2">
            <h1>Profiel Aanpassen</h1>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="box box-default">
                    <div class="box-body">
                        <p>U kunt het wachtwoord leeg laten als u dat niet wilt veranderen</p>

                        {!! Form::model($user,['method' => 'PATCH', 'action' => ['UsersController@selfupdate', $user->id]]) !!}
                        {!! csrf_field() !!}

                        <div class="form-group has-feedback {{ $errors->has('initials') ? 'has-error' : '' }}">
                            {!! Form::text('initials', null, ['class' => 'form-control']) !!}
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            @if ($errors->has('initials'))
                                <span class="help-block">
                            <strong>{{ $errors->first('initials') }}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback {{ $errors->has('insertion') ? 'has-error' : '' }}">
                            {!! Form::text('insertion', null, ['class' => 'form-control']) !!}
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            @if ($errors->has('insertion'))
                                <span class="help-block">
                            <strong>{{ $errors->first('insertion') }}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback {{ $errors->has('surname') ? 'has-error' : '' }}">
                            {!! Form::text('surname', null, ['class' => 'form-control']) !!}
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            @if ($errors->has('surname'))
                                <span class="help-block">
                            <strong>{{ $errors->first('surname') }}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                            {!! Form::text('email', null, ['class' => 'form-control']) !!}
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            @if ($errors->has('email'))
                                <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                            <input type="password" name="password" class="form-control"
                                   placeholder="{{'Nieuw ' . trans('adminlte::adminlte.password') }}">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            @if ($errors->has('password'))
                                <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
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

                        <div class="form-group has-feedback {{ $errors->has('address') ? 'has-error' : '' }}">
                            {!! Form::text('address', null, ['class' => 'form-control']) !!}
                            <span class="glyphicon glyphicon-home form-control-feedback"></span>
                            @if ($errors->has('address'))
                                <span class="help-block">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback {{ $errors->has('postal_code') ? 'has-error' : '' }}">
                            {!! Form::text('postal_code', null, ['class' => 'form-control']) !!}
                            <span class="glyphicon glyphicon-home form-control-feedback"></span>
                            @if ($errors->has('postal_code'))
                                <span class="help-block">
                            <strong>{{ $errors->first('postal_code') }}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback {{ $errors->has('residence') ? 'has-error' : '' }}">
                            {!! Form::text('residence', null, ['class' => 'form-control']) !!}
                            <span class="glyphicon glyphicon-home form-control-feedback"></span>
                            @if ($errors->has('residence'))
                                <span class="help-block">
                            <strong>{{ $errors->first('residence') }}</strong>
                        </span>
                            @endif
                        </div>

                        <button type="submit"
                                class="btn btn-primary btn-block btn-flat"
                        >{{ trans('adminlte::adminlte.register') }}</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection