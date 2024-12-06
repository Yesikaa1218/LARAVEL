 @extends('layout.Front.main')

@section('pagetitle', $data->name)
@section('content')
<!--Pazos ayuda no se que hacer :ccccccccccccccc-->
    <!--Page Header Start-->
    <section class="page-header pt-5 clearfix"
            style="background-image: url('{{asset('front/assets/images/backgrounds/fachada.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 pt-5">
                    <div class="page-header__wrapper clearfix">
                        <div class="page-header__title pt-5">
                            <h2 style="text-transform: none;">Registrarse al congreso</h2>
                            <hr>
                        </div>
                        <div class="page-header__menu">
                            <ul class="page-header__menu-list list-unstyled clearfix">
                                <li><a href="{{route('index')}}">Inicio</a></li>
                                <li><a href="#">Congresos</a></li>
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

                <div class="col-xs-12 col-md-12">
                <h2 class="text-center">Bienvendio al congreso: {{$data->name}}</h2>

                <div class="pt-5"></div>
                
                {!!$data->content_page!!}

                <p><img src="/storage/{{$data->image}}" alt="img" class="img-fluid"></p>

                </div>

                <!--<div class="col-xl-12 col-lg-12 pt-5">

                    <h2 class="text-center">Registro al congreso</h2>
                    <hr>
                    <div class="pt-5"></div>

                        <h4>Para poder registrate al congreso es necesario llenar la siguiente información <br> Los campos marcados con <span class="text-danger">*</span> son obligatorios</h4>
                   
                    <div class="row form-contenido">
                        <div class="col-sm-12 col-md-12 pt-12 email-div" style ="">
                            <div class="form-group">
                                <label for="email">Correo electrónico <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email_login" name="email_login" aria-describedby="emailhelp" required>
                                <small id="emailhelp" class="form-text text-muted">
                                    Favor de ingresar el correo electrónico
                                </small>
                            </div>
                        </div>
                        <div class='col-sm-12 col-md-12 pt-12 password-div' style ="display: none;">
                            <div class="form-group">
                                <label for='password'>Contraseña <span class='text-danger'>*</span></label>
                                <input type='password' class='form-control' id='password_login' name='password_login' aria-describedby='passwordhelp' required>
                                <small id='passwordhelp' class='form-text text-muted'>
                                    Favor de ingresar su contraseña
                                </small>
                            </div>
                        </div>
                     
                    <div class="row">
                        <div class="col-sm-12 col-md-6 pt-2">
                            <div class="form-group">
                                <label for="name">Nombre completo <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" aria-describedby="namehelp" required>
                                <small id="namehelp" class="form-text text-muted">
                                    Favor de ingresar el nombre completo
                                </small>
                              </div>
                        </div>
                       
                        <div class="col-sm-12 col-md-6 pt-2">
                            <div class="form-group">
                                <label for="email">Teléfono </label>
                                <input type="phone" class="form-control" id="phone" name="phone" aria-describedby="phonehelp" >
                                <small id="phonehelp" class="form-text text-muted">
                                    Puedes registrar un teléfono de manera opcional
                                </small>
                              </div>
                        </div>

                       <div class="col-sm-12 col-md-6 pt-2">
                            <div class="form-group">
                                <label for="email">Correo electrónico <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailhelp" required>
                                <small id="emailhelp" class="form-text text-muted">
                                    Favor de ingresar el correo electrónico
                                </small>
                              </div>
                        </div>

                        <div class="col-sm-12 col-md-6 pt-2">
                            <div class="form-group">
                                <label for="email_confirm">Confirmar correo electrónico <span class="text-danger">*</span></label>
                                <input type="email_confirm" class="form-control" id="email_confirm" name="email_confirm" aria-describedby="email_confirmhelp" required>
                                <small id="email_confirmhelp" class="form-text text-muted">
                                    Favor de confirmar el correo electrónico
                                </small>
                              
                        </div> 
                    </div>
                    <div class="pt-5"></div>

                    <button id="btn_subir" accion="show-password-input" type="button" class="btn btn-primary btn-lg btn-block By_Chobbi">Registrarse al Congreso</button>
                          
                    <div class="pt-5"></div>

                </div>-->
                <div class="col-xl-12 col-lg-12 pt-5">

                  <h2 class="text-center">Registro al congreso</h2>
                  <hr>
                  <div class="pt-5"></div>

                  <h4>Para poder registrate al congreso es necesario llenar la siguiente información <br> Los campos marcados con <span class="text-danger">*</span> son obligatorios</h4>


                  <div class="row form-contenido">
                        <div class="col-sm-12 col-md-12 pt-12 email-div" style ="">
                            <div class="form-group" id="emailForm">
                                <label for="email">Correo electrónico <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email_login" name="email_login" aria-describedby="emailhelp" required>
                                <small id="emailhelp" class="form-text text-muted">
                                    Favor de ingresar el correo electrónico
                                </small>
                            </div>
                        </div>

                        <div class='col-sm-12 col-md-12 pt-12 password-div' style ="display: none">
                            <div class="form-group">
                                <label for='password'>Contraseña <span class='text-danger'>*</span></label>
                                <input type='password' class='form-control' id='password_login' name='password_login' aria-describedby='passwordhelp' required>
                                <small id='passwordhelp' class='form-text text-muted'>
                                    Favor de ingresar su contraseña
                                </small>
                            </div>
                        </div>
                        
                        
                        <div class="alert alert-danger invalidEmail" role="alert" style="display: none;">
                            <p>El correo ingresado no es válido.</p>
                        </div>
                       

                        <div class="col-sm-12 col-md-6 pt-2 InfoRegistro" style ="display: none;">
                            <div class="form-group">
                                <label for="name">Nombre completo <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" aria-describedby="namehelp" required style="text-transform: capitalize;">
                              </div>
                        </div>
                       
                        <div class="col-sm-12 col-md-6 pt-2 InfoRegistro" style ="display: none;">
                            <div class="form-group">
                                <label for="email">Teléfono  <span class='text-danger'>*</span></label>
                                <input type="number" id="phone" name="phone" class="form-control" aria-describedby="phonehelp" randomComment="No funciona el type='tel' wa iorar -Pazos" required>
                              </div>
                        </div>

                        <div class="col-sm-12 col-md-6 pt-2 InfoRegistro" style ="display: none;">
                            <div class="form-group">
                                <label for="password">Contraseña <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="password" name="password" aria-describedby="passwordhelp" required>
                              </div>
                        </div>

                        <div class="col-sm-12 col-md-6 pt-2 InfoRegistro" style ="display: none;">
                            <div class="form-group">
                                <label for="password_confirm">Confirmar contraseña <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="password_confirm" name="password_confirm" aria-describedby="password_confirmhelp" required>
                              </div> 
                        </div>

                        <div class="col-sm-12 col-md-12 pt-2 InfoRegistro" style ="display: none;">
                            <div class="form-group">
                                <label for="adscripcion_confirm">Adscripción  <span class='text-danger'>*</span></label>
                                <input type="text" class="form-control" id="adscripcion" name="adscripcion" aria-describedby="adscripcionhelp" required>
                              </div> 
                        </div>
                    </div>

                    <div class="alert alert-danger alreadyRegistered" role="alert" style="display: none;">
                        <p>Ya se ha registrado anteriormente en este congreso.</p>
                    </div>

                    <div class="alert alert-danger incorrectPassword" role="alert" style="display: none;">
                        <p>La contraseña no coincide.</p>
                    </div>

                    <div class="alert alert-warning errorEmpty" role="alert" style="display: none;">
                        <p>Favor de llenar todos los campos.</p>
                    </div>
                    
                    <div class="alert alert-warning incorrectPhone" role="alert" style="display: none;">
                        <p>Ingrese un número de teléfono correcto.</p>
                    </div>

                    <div class="alert alert-success registerSuccess" role="alert" style="display: none;">
                        <p>Se ha registrado al congreso con éxito.</p>
                    </div>

                    <div class="alert alert-success registerUnsuccess" role="alert" style="display: none;">
                        <p>Se ha producido un error en el registro.</p>
                    </div>

<div class="pt-5"></div>

<button id="btn_subir" accion="show-password-input" type="button" class="btn btn-primary btn-lg btn-block By_Chobbi">Registrarse al Congreso</button>
      
<div class="pt-5"></div>

</div>

            </div>
        </div>
    </section>




@endsection
<script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous">
</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>

    
    $(document).ready(function() {

        $("body").on("click", '#btn_user_congreso_register', function (){
            $(".email-div").fadeOut("slow", function() {
                var email_login = $("#email_login").val();
                var password_login = $("#password_login").val();

                $.ajax({
                    url: '/congresos-user/registerPosgrado',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        email: email_login,
                        password: password_login,
                        posgrado_congresos_id: "{{ $data->id }}"
                    },
                    dataType: "json",
                    method: "POST",
                    'success': function(data) {
                        console.log(data);
                            switch(data){
                               
                            case 1: // Ya está registrado 
                                console.log("Ya está registrado");
                                $(".incorrectPassword").hide();
                                $(".registerSuccess").hide();
                                $(".alreadyRegistered").fadeIn("slow", function(){});
                                break; 

                            case 2: // Registro exitoso
                                console.log("Registro exitoso");
                                $(".textInstructions").hide();
                                $(".alreadyRegistered").hide();
                                $(".incorrectPassword").hide();
                                $("#btn_subir").hide();
                                $(".password-div").hide();
                                $(".registerSuccess").fadeIn("slow", function(){});

                                break; 

                            case 3: // Email o contraseña incorrectos
                                console.log("Email o contraseña incorrectos");
                                $(".alreadyRegistered").hide();
                                $(".registerSuccess").hide();
                                $(".incorrectPassword").fadeIn("slow", function(){});
                                break; 
                            }

                        // if(data == true) {
                        //     $(".InfoRegistro").fadeIn("slow", function(){});
                        //     $("#btn_subir").addClass("btn_user_store");
                        //     $("#btn_subir").attr("id","btn_user_store");
                        // } else {
                        //     $(".InfoRegistro").fadeIn("slow", function(){});
                        //     $("#btn_subir").addClass("btn_user_store");
                        //     $("#btn_subir").attr("id","btn_user_store");
                        // }
                    },
                    'fail': function(err) {
                        console.log(err);
                    }
                });
            });
        });

        $("body").on("click", '#btn_user_store', function (){
            $(".incorrectPassword").hide();
            $(".email-div").fadeOut("slow", function() {

                var email_login = $("#email_login").val();
                var name = $("#name").val();
                var phone = $("#phone").val();
                var password = $("#password").val();
                var password_confirm = $("#password_confirm").val();
                var adscripcion = $("#adscripcion").val();

            if(emptyInput(email_login) && emptyInput(name) && emptyInput(phone) && emptyInput(password) && emptyInput(password_confirm) && emptyInput(adscripcion)){
                if(comparePassword(password, password_confirm) ){
                    if(validatePhone(phone)){
                        $(".incorrectPhone").hide();

                    //Si jaló la contraseña
                    $.ajax({
                        url: '/congresos-user/storePosgrado',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            email: email_login,
                            name: name,
                            phone: phone,
                            password: password,
                            password_confirm: password_confirm,
                            adscripcion: adscripcion,
                            posgrado_congresos_id: "{{ $data->id }}"
                        },
                        dataType: "json",
                        method: "POST",
                        'success': function(data) {
                            if(data == true) {
                                console.log("Se registro con éxito");
                                $(".InfoRegistro").fadeOut("slow", function(){});
                                $(".textInstructions").hide();
                                $(".btnRegistroCongreso").hide();
                                $("#btn_subir").hide();
                                $("#btn_user_store").hide();
                                $(".registerSuccess").show();
                            } else {
                                console.log("Ha ocurrido un error en el registro");
                                $(".InfoRegistro").fadeOut("slow", function(){});
                                $(".textInstructions").hide();
                                $(".btnRegistroCongreso").hide();
                                $("#btn_subir").hide();
                                $("#btn_user_store").hide();
                                $(".registerUnsuccess").show();
                            }
                        },
                        'fail': function(err) {
                            console.log(err);
                        }
                    });
                        
                    }else{
                         $(".incorrectPhone").show();
                    }
                } else {
                $(".incorrectPassword").show();
                $(".errorEmpty").hide();

                //Poner algun comentario de error (?)  
            }
        }else{
            $(".errorEmpty").fadeIn("slow", function(){});
            $(".incorrectPassword").hide();
        }
            });
        });

        $("body").on("click", '#btn_subir', function (){
            var email_login = $("#email_login").val();
            if(ValidateEmail(email_login)===true){
            $(".invalidEmail").hide();
            $(".email-div").fadeOut("slow", function() {
                var email_login = $("#email_login").val();
             
                $.ajax({
                    url: '/congresos-user/validate',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        email: email_login
                    },
                    dataType: "json",
                    method: "POST",
                    'success': function(data) {
                        if(data == true) {
                            $(".password-div").fadeIn("slow", function(){});
                            $("#btn_subir").addClass("btn_user_congreso_register");
                            $("#btn_subir").attr("id","btn_user_congreso_register");
                        } else {
                            $(".InfoRegistro").fadeIn("slow", function(){});
                            $("#btn_subir").addClass("btn_user_store");
                            $("#btn_subir").attr("id","btn_user_store");
                        }
                    },
                    'fail': function(err) {
                        console.log(err);
                    }
                });
            });
        }else{
             $(".invalidEmail").fadeIn("slow", function(){});
        }
        });

    });


    function ValidateEmail(mail) 
    {
        ///^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
    if (/[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/.test(mail))
    {
        return (true)
    }
        return (false)
    }


    function comparePassword(password, confirm){
        if(password === confirm){
            return true
        } else {
            return false
        }

    }
function emptyInput(string){
         if(string!=""){
             return true
         } else {
             return false
         }
}

function validatePhone(inputtxt)
{
  var phoneno = /^\d{10}$/;
  if(inputtxt.match(phoneno))
  {
      return true;
  }
  else
  {
     return false;
  }
}

    

</script>
