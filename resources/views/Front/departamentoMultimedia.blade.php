@extends('layout.Front.main')

@section('pagetitle', 'Departamento de Multimedia')

@section('stylespage')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@endsection

@section('content')

    <!--Page Header Start-->
    <section class="page-header pt-5 clearfix" style="background-image: url('{{asset('front/assets/images/backgrounds/fachada.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 pt-5">
                    <div class="page-header__wrapper clearfix">
                        <div class="page-header__title pt-5">
                            <h2 style="text-transform: none;">Departamento de Multimedia</h2>
                            <hr>
                        </div>
                        <div class="page-header__menu">
                            <ul class="page-header__menu-list list-unstyled clearfix">
                                <li><a href="{{route('index')}}">Inicio</a></li>
                                <li><a href="#">Departamento de Multimedia</a></li>
                                <!-- <li class="active">Licenciaturas</li> -->
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--Page Header End-->

    <section class="desripcion-licenciatura pt-5 pb-5  wow fadeInLeft animated animated"
            data-wow-delay="400ms" data-wow-duration="1500ms">
        <div class="container pt-4 pb-2">
            <div class="row justify-content-center align-items-center">
                <div id="miembros-multimedia" class="col-xl-12 col-lg-12 miembros-multimedia">
                
                    <div class="miembro-multimedia-card">
                        <img src="{{asset('front/assets/images/dep_multimedia/abigail_hernandez.jpeg')}}" alt="Abigail Hernández Aguirre" class="miembro-multimedia-image">
                        <h4 class="miembro-multimedia-name text-center">Abigail Hernández Aguirre</h4>
                        <div class="miembro-multimedia-divider"></div>
                        <p class="miembro-multimedia-position text-center">Desarolladora de Software Back-End</p>
                        <a href="https://www.linkedin.com/in/abigail-hern%C3%A1ndez-5aa359222/" target="_blank">
                            <img class="miembro-multimedia-linkedin" src="{{asset('front/assets/images/miembros-multimedia/linkedin-icon.svg')}}" alt="LinkedIn">
                        </a>
                    </div>
                
                    <div class="miembro-multimedia-card">
                        <img src="{{asset('front/assets/images/dep_multimedia/johana_hernandez.jpeg')}}" alt="Perla Johana Hernández Pérez" class="miembro-multimedia-image">
                        <h4 class="miembro-multimedia-name text-center">Perla Johana Hernández Pérez</h4>
                        <div class="miembro-multimedia-divider"></div>
                        <p class="miembro-multimedia-position text-center">Desarolladora de Software Front-End</p>
                        <a href="https://www.linkedin.com/in/abigail-hern%C3%A1ndez-5aa359222/" target="_blank">
                            <img class="miembro-multimedia-linkedin" src="{{asset('front/assets/images/miembros-multimedia/linkedin-icon.svg')}}" alt="LinkedIn">
                        </a>
                    </div>
                    
                    <div class="miembro-multimedia-card">
                        <img src="{{asset('front/assets/images/dep_multimedia/osvaldo_estrada.jpg')}}" alt="Osvaldo Estrada Gutiérrez" class="miembro-multimedia-image">
                        <h4 class="miembro-multimedia-name text-center">Osvaldo Estrada Gutiérrez</h4>
                        <div class="miembro-multimedia-divider"></div>
                        <p class="miembro-multimedia-position text-center">Desarollador de Software Front-End</p>
                        <a href="https://www.linkedin.com/in/abigail-hern%C3%A1ndez-5aa359222/" target="_blank">
                            <img class="miembro-multimedia-linkedin" src="{{asset('front/assets/images/miembros-multimedia/linkedin-icon.svg')}}" alt="LinkedIn">
                        </a>
                    </div>

                    <div class="miembro-multimedia-card">
                        <img src="{{asset('front/assets/images/dep_multimedia/fernando_garcia.jpeg')}}" alt="Fernando García Sanchez Armass" class="miembro-multimedia-image">
                        <h4 class="miembro-multimedia-name text-center">Fernando García Sánchez Armass</h4>
                        <div class="miembro-multimedia-divider"></div>
                        <p class="miembro-multimedia-position text-center">Desarollador de Software Front-End</p>
                        <a href="https://www.linkedin.com/in/abigail-hern%C3%A1ndez-5aa359222/" target="_blank">
                            <img class="miembro-multimedia-linkedin" src="{{asset('front/assets/images/miembros-multimedia/linkedin-icon.svg')}}" alt="LinkedIn">
                        </a>
                    </div>

                    <div class="miembro-multimedia-card">
                        <img src="{{asset('front/assets/images/dep_multimedia/darien_sanchez.jpeg')}}" alt="Darien Miguel Sánchez Arévalo" class="miembro-multimedia-image">
                        <h4 class="miembro-multimedia-name text-center">Darien Miguel Sánchez Arévalo</h4>
                        <div class="miembro-multimedia-divider"></div>
                        <p class="miembro-multimedia-position text-center">Desarollador de Software Front-End</p>
                        <a href="https://www.linkedin.com/in/abigail-hern%C3%A1ndez-5aa359222/" target="_blank">
                            <img class="miembro-multimedia-linkedin" src="{{asset('front/assets/images/miembros-multimedia/linkedin-icon.svg')}}" alt="LinkedIn">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection

@section('scriptspage')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{asset('front/assets/js/miembros-multimedia.js')}}"></script>

    <script>
        $(document).ready(function() {
            $(".linkedin-icon").attr("src", "{{asset('front/assets/images/miembros-multimedia/linkedin-icon.svg')}}");
        });

        $(document).ready(function() {
            $("#angel_medrano").attr("src", "{{asset('front/assets/images/dep_multimedia/angel_medrano.jpg')}}");
        });

        $(document).ready(function() {
            $("#efren_enriquez").attr("src", "{{asset('front/assets/images/dep_multimedia/efren_enriquez.jpeg')}}");
        });

        $(document).ready(function() {
            $("#leslie_rosas").attr("src", "{{asset('front/assets/images/dep_multimedia/leslie_rosas.jpeg')}}");
        });

        $(document).ready(function() {
            $("#salvador_pazos").attr("src", "{{asset('front/assets/images/dep_multimedia/salvador_pazos.jpeg')}}");
        });

    </script>

@endsection