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
	12313452345
	geentestxcvxcvxcvxcv

    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Alle auto's
                            <a href="{{url('cars/create')}}"><span class="fa fa-plus"></span></a>
                        </h3>
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
                                <th></th>
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
                                        {{ Form::open(['route' => ['cars.destroy', $car->id], 'method' => 'delete']) }}
                                        <button type="submit" class="fa fa-trash"></button>
                                        {{ Form::close() }}
                                        {{--<a href="{{url('cars/'. $car->id . '/destroy')}}"><span class="fa fa-trash"></span></a>--}}
                                        <a href="{{url('cars/'. $car->id . '/edit')}}"><span class="fa fa-cogs"></span></a>

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
        </div>
    </section>

    <script>
        $('input[name="daterange"]').daterangepicker();
    </script>
@endsection