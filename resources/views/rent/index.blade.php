@extends('adminlte::page')

@section('content')
    @if(isset($starting_date))
        @php(redirect('rent/form'))
    @endif
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
                <h3 class="box-title">Te huren auto's voor {{$starting_date->toFormattedDateString()}} - {{$end_date->toFormattedDateString()}}
                <a href="{{url('rent/form')}}"><span class="fa fa-edit"></span></a> </h3>
            </div>
            <div class="box-body">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>Merk</th>
                        <th>Type</th>
                        <th>Kenteken</th>
                        <th>GPS</th>
                        <th>Omschrijving</th>
                        <th>Klasse</th>
                        <th>Prijs per dag</th>
                        <th>Status</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($cars as $car)
                        <tr>
                            <td>
                                {{$car->brand}}
                            </td>
                            <td>
                                {{$car->type}}
                            </td>
                            <td>
                                {{$car->license_plate}}
                            </td>
                            <td>
                                @if($car->GPS == 1)
                                    Ja
                                @else
                                    Nee
                                @endif

                            </td>
                            <td>
                                {{$car->description}}
                            </td>
                            <td>
                                {{$car->class}}
                            </td>
                            <td>€ {{$car->price}}</td>
                            <td>
                                @if(in_array($car->id, $rented_cars))
                                    <span class="badge bg-red">Verhuurd</span>
                                @else
                                    <a href="{{ url('/add/' . $car->id) }}"><span class="badge bg-green">Toevoegen</span></a>
                                @endif
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>

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
                <th>Type</th>
                <th>Kenteken</th>
                <th>Prijs per dag</th>
                <th>Van</th>
                <th>Tot</th>
                <th></th>
            </tr>
            </thead>

            <tbody>

            @foreach(Cart::content() as $row)
            <tr>
                <td>
                    <p>{{$row->options->brand}}</p>
                </td>
                <td>
                    {{$row->options->type}}
                </td>
                <td>
                    {{$row->options->license_plate}}
                </td>
                <td>€ {{$row->price}}</td>
                <td>
                    {{$row->options->starting_date->toFormattedDateString()}}
                </td>
                <td>
                    {{$row->options->end_date->toFormattedDateString()}}
                </td>

                <td><a href="{{url('deleterow/' . $row->rowId)}}"><span class="fa fa-trash"></span></a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
                    @if(Cart::content()->count() > 0)
                    <br>
                    <a href="{{url('rent/check')}}" class="btn btn-success">Afrekenen</a>
                    @endif
            </div>
            </div>
        </div>
    </div>
    </section>

<script>
    $('input[name="daterange"]').daterangepicker();
</script>
@endsection