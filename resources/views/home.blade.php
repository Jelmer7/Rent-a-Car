@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
@role('employee')
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-warning">
                <div class="panel-heading">Employer msg</div>

                <div class="panel-body">
                    Only Employee roles will see this.
                </div>
            </div>
        </div>
@endrole
    </div>
</div>
@endsection
