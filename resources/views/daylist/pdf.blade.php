<link rel="stylesheet"
      href="{{ asset('vendor/adminlte/dist/css/skins/skin-' . config('adminlte.skin', 'blue') . '.min.css')}} ">
<link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/AdminLTE.min.css') }}">
<div class="box box-default">

    <h1>Auto's</h1>

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