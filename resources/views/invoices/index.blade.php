@extends('adminlte::page')

@section('content')
    <section class="content-header">
        <div class="content-header">
            <h1>Facturen</h1>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Facturen</h3>
                    </div>
                    <div class="box-body">
                        @foreach($invoices as $invoice)
                        <a href="{{url('invoices/'.$invoice->id)}}">{{$invoice->id}}</a>
                            {{$invoice->date}} <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection