@extends('adminlte::page')

@section('content')
    <section class="content-header">
        <div class="content-header">
            <h1>Winkelwagen</h1>
        </div>
    </section>

    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <div class="box box-default fixed">
                    <div class="box-body">
                        <h4>Controleer of onderstaande gegevens kloppen</h4>
                        <br>
                        <p>{{$user->initials}}
                        {{$user->insertion}}
                        {{$user->surname}}</p>
                        <p>{{$user->address}}</p>
                        <p>{{$user->postal_code}}, {{$user->residence}}</p>
                        <p>{{$user->email}}</p>
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Type</th>
                                <th>Prijs per dag</th>
                                <th>Van</th>
                                <th>Tot</th>
                                <th>Aantal dagen</th>
                                <th>Totaal prijs</th>
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
                                    <td>€ {{$row->price}}</td>
                                    <td>
                                        {{$row->options->starting_date->toFormattedDateString()}}
                                    </td>
                                    <td>
                                        {{$row->options->end_date->toFormattedDateString()}}
                                    </td>
                                    <td>
                                        {{$row->options->starting_date->diffInDays($row->options->end_date)}}
                                    </td>
                                    <td>
                                        {{$row->options->starting_date->diffInDays($row->options->end_date) * $row->price}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <br>
                        <a href="{{url('rent/invoice')}}" class="btn btn-success">Factuur maken</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $('input[name="daterange"]').daterangepicker();
    </script>
@endsection