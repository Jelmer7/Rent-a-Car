@extends('adminlte::page')

@section('content')
    <section class="content-header">
        <div class="content-header">
            <h1>Zoek een auto!</h1>
        </div>
    </section>

    <section class="content">
        <div class="row">

            <div class="col-md-7">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Wanneer wilt u huren?</h3>
                    </div>
                    <div class="box-body">
                        {{Form::open(array('route' => array('rent')))}}
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                        <input type="text" class="form-control pull-right" name="daterange"/>

                        </div>
                        <br>
                        {{Form::submit('Click Me!', array(
                        'class' => 'btn btn-block btn-success'
                        ))}}
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
                            <th>--</th>
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
        $('input[name="daterange"]').daterangepicker(
            {
                minDate: new Date((new Date().getTime() + 24 * 60 * 60 * 1000))
            }
        );
    </script>
@endsection