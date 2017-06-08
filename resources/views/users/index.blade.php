@extends('adminlte::page')

@section('content')

    <section class="content-header">
        <div class="content-header col-md-offset-2">
            <h1>Medewerkers</h1>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Medewerkers
                            <a href="{{url('users/create')}}"><span class="fa fa-plus"></span></a>
                        </h3>
                    </div>
                    <div class="box-body">
            <table class="table table-hover table-bordered">
                <thead>
                <th>Naam</th>
                <th>Rol</th>
                <th></th>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            {{$user->initials}}
                            {{$user->insertion}}
                            {{$user->surname}}
                        </td>
                        <td>
                            @foreach($user->roles as $role)
                                {{$role->display_name}}
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ url('/users/' . $user->id .'/edit') }}"><span class="fa fa-cogs" aria-hidden="true"></span></a>
                            {{ Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) }}
                            <button type="submit" class="fa fa-trash"></button>
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

                    </div>
                </div>
            </div>
    </section>

@endsection