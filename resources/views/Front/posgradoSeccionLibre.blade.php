@extends('layout.Front.main')

@section('pagetitle', 'Seccion Libre')
@section('stylespage')


@endsection
@section('content')

    <!--Page Header Start-->
    <section class="page-header pt-5 clearfix"
        style="background-image: url('{{asset('front/assets/images/backgrounds/fachada.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 pt-5">
                    <div class="page-header__wrapper clearfix">
                        <div class="page-header__title pt-5">
                            <h2 style="text-transform: none;">Área Libre</h2>
                            <hr>
                        </div>
                        <div class="page-header__menu">
                            <ul class="page-header__menu-list list-unstyled clearfix">
                                <li><a href="{{route('index')}}">Inicio</a></li>
                                <li><a href="#">Área Libre</a></li>
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


       <div class="container pt-5">
       <div class="row">
            <div class="col-sm-12 col-md-8 ">
            <div class="container">

            @if($seccData)
            <div class="row">
            
            @foreach($seccData as $data)
                <!--Start Single Blog One-->
                <div class="col-xl-12 col-lg-12 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="blog-one__single"  style="
                    height: 100%; 
                    display: flex; 
                    flex-direction: column;
                    ">
                        <div class="blog-one__single-img">
                        @if($data->imagen)
                        <img src="/storage/{{$data->imagen}}" class="img-fluid rounded-start img-thumbnail mx-auto d-block" alt="{{$data->titulo}}">
                        @endif
                        </div>
                        <div class="col-md-13">
                            <center>
                                <div class="card-body text-center"> 
                                    <h5 class="card-title">{{$data->titulo}}</h5>
                                
                                    <p class="card-text">{!! $data->contenido !!}</p>
                                    <a href="{{route('posgrados.detalle-seccion-libre.show', $data->id)}}" class="btn btn-dark-mode">Ver detalle</a>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
                
                <!--End Single Blog One-->
                @endforeach
            </div>

            @endif

            @if(!$seccData)
            <div class="row">
                <div class="col-sm-12 text-center">
                        <h3>No hay información para mostrar.</h3>
                </div>
            </div>
            @endif

            </div>
          
          
        </div>
        <div class="col-sm-12 col-md-4">
                <div class="row">
                    <div class="col-sm-12">
                        <form action="#">
                            <div class="input-group mb-3" id="Me tardé como 3 horas pero al fin funciona :D By: Pazos">
                                <input name="searchBar" type="text" class="form-control" placeholder="Buscar..." aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                            </div>
                        </form>
                        <hr>
                    </div>

                    <div class="col-sm-12 pt-5">
                       <h3>Posgrados</h3>
                       <hr>
                       <div class="list-group">
                       @if($posgrado)
                            @foreach($posgrado as $dataPosgrado)
                                <a href="{{route('posgrados.mostrar-por-posgrados',$dataPosgrado->id)}}" class="list-group-item list-group-item-action">{{$dataPosgrado->nombre_posgrado}}</a>
                            @endforeach
                       @endif
                       </div>
                    </div>


                   
                </div>
                    </div>
                    @if($seccData)
                 {{ $seccData->onEachSide(5)->links() }}
                @endif

</div>
</div>

    </section>




@endsection
     