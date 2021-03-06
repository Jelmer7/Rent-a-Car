@extends('adminlte::page')

@section('content')
    <section class="content-header col-md-offset-2">
        <div class="content-header">
            <h1>Factuur
                <a href={{url('invoices/' . $invoice->id . '/pdf')}}><span class="fa fa-file-pdf-o"></span></a>
            </h1>

        </div>
    </section>

    <section class="content">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <div class="box box-default fixed">
                    <div class="box-body">
                        <h2>Factuur</h2>
                        <br>
                        <p>Rent-a-Car</p>
                        <p>Parkweg 1</p>
                        <p>7772 XP, Hardenberg</p>
                        <p>0523-123456</p>
                        <br><br>
                        <p>Factuurnummer:{{$invoice->id}}</p>
                        <p>Datum: {{$invoice->date}}</p>
                        <br><br>
                        <p>{{$user->initials}}
                            {{$user->insertion}}
                            {{$user->surname}}</p>
                        <p>{{$user->address}}</p>
                        <p>{{$user->postal_code}}, {{$user->residence}}</p>
                        <p>{{$user->email}}</p>
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>Merk</th>
                                <th>Type</th>
                                <th>Kenteken</th>
                                {{--<th>GPS</th>--}}
                                {{--<th>Omschrijving</th>--}}
                                {{--<th>Klasse</th>--}}
                                <th>Prijs per dag</th>
                                <th>Van</th>
                                <th>Tot</th>
                                <th>Aantal dagen</th>
                                <th>Totaal prijs</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($invoice_lines as $line)
                                <tr>
                                    <td>
                                        <p>{{$line->car->brand}}</p>
                                    </td>
                                    <td>
                                        {{$line->car->type}}
                                    </td>
                                    <td>
                                        {{$line->car->license_plate}}
                                    </td>
                                    {{--<td>--}}
                                        {{--@if($line->car->gps == 1)--}}
                                            {{--Ja--}}
                                        {{--@else--}}
                                            {{--Nee--}}
                                        {{--@endif--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                        {{--{{$line->car->description}}--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                        {{--{{$line->car->class}}--}}
                                    {{--</td>--}}
                                    <td>
                                        € {{$line->car->price}}
                                    </td>
                                    <td>
                                        {{$line->starting_date->toFormattedDateString()}}
                                    </td>
                                    <td>
                                        {{$line->end_date->toFormattedDateString()}}
                                    </td>
                                    <td>
                                        {{$line->starting_date->diffInDays($line->end_date)}}
                                    </td>
                                    <td>
                                        {{$line->starting_date->diffInDays($line->end_date) * $line->car->price}}
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>
                                <strong>BTW</strong>
                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                <td>

                                </td>
                                {{--<td></td>--}}
                                {{--<td></td>--}}
                                {{--<td></td>--}}
                                <td>
                                    {{$btw}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <strong>Totaal</strong>
                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                <td>

                                </td>
                                {{--<td></td>--}}
                                {{--<td></td>--}}
                                {{--<td></td>--}}
                                <td>
                                    {{$total}}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <br>
                        <p>*Betalingen dienen plaats te vinden veertien dagen voor de aanvang van de gereserveerde periode op rekeningnummer 3210808 ten name van het Rent-a-Car te Almere.
                            Indien er gereserveerd is binnen veertien dagen voor de aanvang van de gereserveerde periode, dient de betaling direct plaats te vinden</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection