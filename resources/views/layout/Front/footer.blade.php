<!--Start Footer One-->
<footer class="footer-one">
    <div class="footer-one__bg">
    </div><!-- /.footer-one__bg -->
    <div class="footer-one__top">
        <div class="container">
            <div class="row">
                <!--Start Footer Widget Column-->
                <div class="col-xl-2 col-lg-4 col-md-4 wow animated fadeInUp" data-wow-delay="0.1s">
                    <div class="footer-widget__column footer-widget__about">
                        <div class="footer-widget__about-logo">
                            <a href="{{route('index')}}"><img src="{{asset('front/assets/images/resources/logo-excelencia-blanco.png')}}"
                                                       style="max-width: 130px" alt=""></a>
                        </div>
                    </div>
                </div>
                <!--End Footer Widget Column-->

                <!--Start Footer Widget Column-->
                 <div class="col-xl-2 col-lg-4 col-md-4 wow animated fadeInUp" data-wow-delay="0.3s">
                    <div class="footer-widget__column footer-widget__courses">
                        <h3 class="footer-widget__title">Licenciaturas</h3>
                        <ul class="footer-widget__courses-list list-unstyled">
                            @foreach($licenciaturas as $item)
                            <li><a href="/licenciatura/{{$item->slug}}">{{$item->nombre_licenciatura}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div> 
                <!--End Footer Widget Column-->

                <!--Start Footer Widget Column-->
                <div class="col-xl-2 col-lg-4 col-md-4 wow animated fadeInUp" data-wow-delay="0.5s">
                    <div class="footer-widget__column footer-widget__links">
                        <h3 class="footer-widget__title">Posgrados</h3>
                        <ul class="footer-widget__links-list list-unstyled">
                            @foreach ($posgrado as $item)
                            <li><a href="/posgrados/{{$item->slug}}">{{$item->nombre_posgrado}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!--End Footer Widget Column-->

                <!--Start Footer Widget Column-->
                <div class="col-xl-3 col-lg-6 col-md-6 wow animated fadeInUp" data-wow-delay="0.7s">
                    <div class="footer-widget__column footer-widget__contact">
                        <h3 class="footer-widget__title">Contacto</h3>
                        <p class="text text-align ">Av. Universidad s/n. Ciudad Universitaria San Nicolás de los Garza, C.P. 66451 <br>
Nuevo León, México
                        </p>
                        <p class="phone text text-align"><a href="tel:8183294030">Tel. 81 83 29 40 30</a></p>
                    </div>
                </div>
                <!--End Footer Widget Column-->

                <!--Start Footer Widget Column-->
                <div class="col-xl-3 col-lg-6 col-md-6 wow animated fadeInUp" align="right" data-wow-delay="0.9s">
                    <div class="footer-widget__column footer-widget__social-links  d-flex justify-content-center" align="right">
                        <ul class="footer-widget__social-links-list list-unstyled clearfix" align="right">
                            <li><a href="https://www.facebook.com/FCFM.UANL" target="_blank"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="https://twitter.com/FCFMUANL" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!--End Footer Widget Column-->

            </div>
        </div>
    </div>

    <!--Start Footer One Bottom-->
    <div class="footer-one__bottom">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="footer-one__bottom-inner">
                        <div class="footer-one__bottom-text text-center">
                            <p>&copy; Copyright {{\Illuminate\Support\Carbon::now()->format('Y')}} FCFM <!--</a> --></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--End Footer One Bottom-->
</footer>
<!--End Footer One-->
