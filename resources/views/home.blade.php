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
@role('admin')
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-warning">
                <div class="panel-heading">Admin msg</div>

                <div class="panel-body">
                    Only Admin roles will see this.
                </div>
            </div>
        </div>
@endrole
    </div>
</div>
@endsection
