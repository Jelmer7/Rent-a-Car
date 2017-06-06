@extends('adminlte::page')

@section('content')
    <h1>Huur een Auto</h1>

    @foreach($cars as $car)
        {{$car->brand}} ||| {{$car->model}} <br> <br>
    @endforeach

@endsection