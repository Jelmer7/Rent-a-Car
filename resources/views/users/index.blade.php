@extends('adminlte::page')

@section('content')
    <h1>Gebruikers</h1>
    <div class="content-wrapper">
        <p><a href="{{ url('/users/create') }}">Nieuwe gebruiker aanmaken <span class="fa fa-plus" aria-hidden="true"></span></a></p>

        <div class="box">
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
                            {{$user->name}}
                        </td>
                        <td>
                            @foreach($user->roles as $role)
                                {{$role->display_name}}
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ url('/users/' . $user->id .'/edit') }}"><span class="fa fa-cogs" aria-hidden="true"></span></a>
                            <a href="{{ url('/users/' . $user->id .'/delete') }}"><span class="fa fa-trash" aria-hidden="true"></span></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection