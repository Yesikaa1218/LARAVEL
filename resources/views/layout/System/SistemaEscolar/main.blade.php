<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>FCFM -  @yield('page_name', 'Home')</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('assets/css/sb-admin-2.css')}}" rel="stylesheet">

    <style>

        .tox-notification{
            display: none !important;
        }

        .tox .tox-notification--warn, .tox .tox-notification--warning{
            display: none;
        }
    </style>

    @yield('styles-page')

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

@include('layout.System.SistemaEscolar.sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

        {{-- @include('layout.System.SistemaEscolar.topbar') --}}
        @include('layout.System.SistemaEscolar.topbar')

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
               @yield('page-header')

               @yield('content')

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

     @include('layout.System.footer')

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src={{asset('assets/vendor/jquery/jquery.min.js')}}></script>
<script src={{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}></script>

<!-- Core plugin JavaScript-->
<script src={{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}></script>
<script src = "https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

<!-- Custom scripts for all pages-->
<script src={{asset('assets/js/sb-admin-2.min.js')}}></script>

<!-- Page level plugins -->
<script src={{asset('assets/vendor/chart.js/Chart.min.js')}}></script>

<!-- Page level custom scripts -->
<script src={{asset('assets/js/demo/chart-area-demo.js')}}></script>
<script src={{asset('assets/js/demo/chart-pie-demo.js')}}></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.js"></script>
<script>
    $('div.alert').not('.alert-important').delay(15000).fadeOut(350);
</script>
<!-- En el head de tu HTML -->



@yield('scripts-page')


<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function () {
        // Verificar si ya se ha mostrado el Swal
        if (!localStorage.getItem('swalShown')) {
            // Cargar la firma del usuario al cargar la página
            fetch("{{ route('SistemaEscolar.empleados.cargar.firma') }}")
                .then(response => response.json())
                .then(data => {
                    if (data.firma == null) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Agregue su firma para utilizar la aplicación.',
                            showConfirmButton: true,
                            allowOutsideClick: false
                        }).then(function() {
                            // Marcar que se mostró el Swal
                            localStorage.setItem('swalShown', true);
                            // Redirigir a la página de agregar firma
                            window.location.href = "{{ route('SistemaEscolar.empleados.updateFirma') }}";
                        });
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    });


</script>
</body>

</html>
