@extends('adminlte::page')

@section('content')

    <div class="col-md-3">
        <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <i class="fa fa-phone"></i>
                </span>
            <div class="info-box-content">
                    <span class="info-box-text">
                        Bellen
                    </span>
                <span class="info-box-number">
                        0512-345678
                    </span>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <i class="fa fa-envelope"></i>
                </span>
            <div class="info-box-content">
                    <span class="info-box-text">
                        Email
                    </span>
                <span class="info-box-number">
                        info@rentacar.nl
                    </span>
            </div>
        </div>
    </div>



    <div class="col-md-3">
        <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <i class="fa fa-home"></i>
                </span>
            <div class="info-box-content">
                    <span class="info-box-text">
                        Adres
                    </span>
                <span class="info-box-number">
                        Parkweg 1 <br>
                    7772 XP, Hardenberg

                    </span>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <i class="fa fa-envelope"></i>
                </span>
            <div class="info-box-content">
                    <span class="info-box-text">
                       Fax
                    </span>
                <span class="info-box-number">
                        0512-345687
                    </span>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default fixed">
                    <div class="box-body">
                        <div class="col-md-4">
                            <p>Wij zijn open voor bezoek van <strong>Maandag</strong> t/m <strong>Vrijdag</strong> <br>
                            Openingstijden: <strong>8:00 - 17:00</strong></p>
                        </div>
                        <img src="{{asset('img/garage.jpg')}}" alt="" width="100%">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
