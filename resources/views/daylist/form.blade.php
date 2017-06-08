@extends('adminlte::page')

@section('content')
    <section class="content-header col-md-offset-2">
        <div class="content-header">
            <h1>Zoek een auto!</h1>
        </div>
    </section>

    <section class="content">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Wanneer wilt u huren?</h3>
                    </div>
                    <div class="box-body">
                        {{Form::open(array('route' => array('daylist')))}}
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" name="date"/>

                        </div>
                        <br>
                        {{Form::submit('Click Me!', array(
                        'class' => 'btn btn-block btn-success'
                        ))}}
                    </div>
                </div>
            </div>
        </div>

    </section>

    <script>
        $('input[name="date"]').daterangepicker(
            {
                "singleDatePicker": true,
                "minDate": new Date((new Date().getTime() + 24 * 60 * 60 * 1000))

            }
        );
    </script>
@endsection