@extends('adminlte::page')

@section('content')
    <section class="content-header">
        <div class="content-header">
            <h1>Auto's</h1>
        </div>
    </section>

    <section class="content">
    <div class="row">

    <div class="col-md-7">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Te huren auto's voor {{$starting_date}} - {{$end_date}}</h3>
            </div>
            <div class="box-body">
                @foreach($cars as $car)
                    {{$car->brand}} ||| {{$car->type}}
                    <a href="{{ url('/add/' . $car->id) }}">+</a>
                    <br> <br>
                @endforeach
            </div>
        </div>
    </div>


        <div class="col-md-5">
            <div class="box box-default fixed">
                <div class="box-header with-border">
                    <h3 class="box-title">Winkelwagen</h3>
                </div>
                <div class="box-body">
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>--</th>
            </tr>
            </thead>

            <tbody>

            @foreach(Cart::content() as $row)
            <tr>
                <td>
                    <p>{{$row->options->brand}}</p>
                </td>
                <td>€ {{$row->price}}</td>

                <td><a href="{{url('deleterow/' . $row->rowId)}}">--</a></td>
            </tr>

            @endforeach

            </tbody>
        </table>
            </div>
            </div>
        </div>
    </div>
    </section>

<script>
    $('input[name="daterange"]').daterangepicker();
</script>
@endsection