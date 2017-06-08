@extends('adminlte::page')

@section('content')
    <section class="content-header">
        <div class="content-header">
            <h1>Auto's <a href="{{url('daylist/pdf/'. $date)}}"><span class="fa fa-file-pdf-o"></span></a></h1>
        </div>
    </section>

    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <div class="box box-default">

                    <div class="box-body">
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>Merk</th>
            <th>Type</th>
            <th>Kenteken</th>
            <th>Klant</th>
            <th>Verhuur datum</th>
            <th>Terugkom datum</th>
        </tr>
        </thead>

        <tbody>

        @foreach($invoice_lines as $line)
            <tr>
                <td>
                    {{$line->car->brand}}
                </td>
                <td>
                    {{$line->car->type}}
                </td>
                <td>
                    {{$line->car->license_plate}}
                </td>
                <td>{{$line->invoice->user->initials}}
                    {{$line->invoice->user->insertion}}
                    {{$line->invoice->user->surname}}
                </td>
                <td>
                    {{$line->starting_date->toFormattedDateString()}}
                </td>
                <td>
                    {{$line->end_date->toFormattedDateString()}}
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

                    </div>
                </div>
            </div>

@endsection