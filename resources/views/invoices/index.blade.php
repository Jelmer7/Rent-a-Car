@extends('adminlte::page')

@section('content')
    <section class="content-header col-md-offset-2">
        <div class="content-header">
            <h1>Facturen</h1>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Facturen</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>Factuurnummer</th>
                                <th>Factuurdatum</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($invoices as $invoice)
                                <tr>
                                    <td>
                                        <a href="{{url('invoices/'.$invoice->id)}}">{{$invoice->id}}</a>
                                    </td>
                                    <td>
                                        {{$invoice->date}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection