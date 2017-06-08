@extends('adminlte::page')

@section('content')
    <section class="content-header col-md-offset-4">
        <div class="content-header">
            <h1>Medewerker toevoegen</h1>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="box box-default">
                    <div class="box-body">


                        <form action="{{ url('users') }}" method="post">
                            {!! csrf_field() !!}

                            <div class="form-group has-feedback {{ $errors->has('initials') ? 'has-error' : '' }}">
                                <input type="text" name="initials" class="form-control" value="{{ old('initials') }}"
                                       placeholder="{{ trans('adminlte::adminlte.initials') }}">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                @if ($errors->has('initials'))
                                    <span class="help-block">
                            <strong>{{ $errors->first('initials') }}</strong>
                        </span>
                                @endif
                            </div>

                            <div class="form-group has-feedback {{ $errors->has('insertion') ? 'has-error' : '' }}">
                                <input type="text" name="insertion" class="form-control" value="{{ old('insertion') }}"
                                       placeholder="{{ trans('adminlte::adminlte.insertion') }}">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                @if ($errors->has('insertion'))
                                    <span class="help-block">
                            <strong>{{ $errors->first('insertion') }}</strong>
                        </span>
                                @endif
                            </div>

                            <div class="form-group has-feedback {{ $errors->has('surname') ? 'has-error' : '' }}">
                                <input type="text" name="surname" class="form-control" value="{{ old('surname') }}"
                                       placeholder="{{ trans('adminlte::adminlte.surname') }}">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                @if ($errors->has('surname'))
                                    <span class="help-block">
                            <strong>{{ $errors->first('surname') }}</strong>
                        </span>
                                @endif
                            </div>

                            <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                       placeholder="{{ trans('adminlte::adminlte.email') }}">
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                                @endif
                            </div>

                            <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                                <input type="password" name="password" class="form-control"
                                       placeholder="{{ trans('adminlte::adminlte.password') }}">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                                @endif
                            </div>
                            <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                                <input type="password" name="password_confirmation" class="form-control"
                                       placeholder="{{ trans('adminlte::adminlte.retype_password') }}">
                                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                                @endif
                            </div>

                            <div class="form-group has-feedback {{ $errors->has('address') ? 'has-error' : '' }}">
                                <input type="text" name="address" class="form-control" value="{{ old('address') }}"
                                       placeholder="{{ trans('adminlte::adminlte.address') }}">
                                <span class="glyphicon glyphicon-home form-control-feedback"></span>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                                @endif
                            </div>

                            <div class="form-group has-feedback {{ $errors->has('postal_code') ? 'has-error' : '' }}">
                                <input type="text" name="postal_code" class="form-control" value="{{ old('postal_code') }}"
                                       placeholder="{{ trans('adminlte::adminlte.postal_code') }}">
                                <span class="glyphicon glyphicon-home form-control-feedback"></span>
                                @if ($errors->has('postal_code'))
                                    <span class="help-block">
                            <strong>{{ $errors->first('postal_code') }}</strong>
                        </span>
                                @endif
                            </div>

                            <div class="form-group has-feedback {{ $errors->has('residence') ? 'has-error' : '' }}">
                                <input type="text" name="residence" class="form-control" value="{{ old('residence') }}"
                                       placeholder="{{ trans('adminlte::adminlte.residence') }}">
                                <span class="glyphicon glyphicon-home form-control-feedback"></span>
                                @if ($errors->has('residence'))
                                    <span class="help-block">
                            <strong>{{ $errors->first('residence') }}</strong>
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