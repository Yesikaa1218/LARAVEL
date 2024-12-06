@extends('layout.System.SistemaEscolar.main')
@section('page_name', 'Actualizar Firma')

@section('styles-page')
    <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    
    
@endsection

@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Actualizar Firma</h1>
    </div>
@endsection

@section('content')
<style>
    .responsive-canvas-container {
        width: 500px;
        height: 350px;
        position: relative;
    }
    #borrarFirma{
        position: relative;
        bottom: 16px;
        right: 275px;
    }
    @media (max-width: 660px) {
        .responsive-canvas-container {
            width: 300px;
            height: 150px;
        }
        #borrarFirma{
            position: relative;
            bottom: 16px;
            right: 175px;
        }
    }
</style>
<div class="container">
    <form method="POST" action="">
        @csrf
        <div class="form-group text-center">
            <label for="firmaCanvas">Firmar:</label>
            <div class="border bg-white p-3 text-center mx-auto responsive-canvas-container">
                <canvas id="firmaCanvas" width="500" height="350" style="position: absolute; top: 0; left: 0;"></canvas>
                <button type="button" id="borrarFirma" class="btn btn-secondary">
                    <i class="fas fa-eraser"></i>
                </button>
                <input type="hidden" id="firmaBase64" name="firmaBase64"> <!-- Campo oculto para la firma en base64 -->
            </div>
        </div>
        <div class="form-group text-center">
            <div class="form-group col-md-12 d-flex justify-content-center my-auto">
                <button type="button" id="registrarFirma" class="btn btn-primary mt-3 w-100 text-center">Registrar</button>
            </div>
        </div>
    </form>
</div>


@endsection

@section('scripts-page')

    <script src="https://cdn.tiny.cloud/1/{{ env('TINYMCE_TOKEN') }}/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script src={{asset('/assets/js/specialtinyjs.js')}}></script>
    {{-- canvas responsive --}}
    <script>
        var canvas = document.getElementById('firmaCanvas');
        var ctx = canvas.getContext('2d');

        // Ajusta el tamaño del canvas al cargar la página
        adjustCanvasSize();

        // Función para ajustar el tamaño del canvas
        function adjustCanvasSize() {
            // Obtén el tamaño del contenedor padre (en este caso, el div con clase "border")
            var container = document.querySelector('.border');

            // Ajusta el ancho y el alto del canvas al tamaño del contenedor
            canvas.width = container.clientWidth;
            canvas.height = container.clientHeight;
        }

        // Vuelve a ajustar el tamaño del canvas cuando la ventana cambia de tamaño
        window.addEventListener('resize', function () {
            adjustCanvasSize();
        });
    </script>
    

    
    {{-- Firma --}}
    <script>
        // Firma
        // Obtén el elemento <canvas>
        var canvas = document.getElementById('firmaCanvas');
        var ctx = canvas.getContext('2d');

        var firmaActiva = false;
        var firmaX, firmaY;

        // Función para obtener las coordenadas en el canvas
        function getCoords(event) {
            var rect = canvas.getBoundingClientRect();
            var x = event.clientX - rect.left;
            var y = event.clientY - rect.top;
            return { x: x, y: y };
        }

        // Prevención de scrolling durante la firma
        function preventScroll(event) {
            event.preventDefault();
        }

        // Manejador de eventos táctiles y de ratón
        function handleInputStart(e) {
            firmaActiva = true;
            var coords = getCoords(e.touches ? e.touches[0] : e);
            firmaX = coords.x;
            firmaY = coords.y;

            // Prevenir scrolling durante el dibujo
            document.addEventListener('touchmove', preventScroll, { passive: false });
            document.addEventListener('mousemove', preventScroll, { passive: false });
        }

        function handleInputMove(e) {
            if (firmaActiva) {
                var coords = getCoords(e.touches ? e.touches[0] : e);
                ctx.beginPath();
                ctx.moveTo(firmaX, firmaY);
                ctx.lineTo(coords.x, coords.y);
                ctx.strokeStyle = '#000'; // Color de la firma
                ctx.lineWidth = 2; // Grosor del trazo
                ctx.stroke();

                firmaX = coords.x;
                firmaY = coords.y;
            }
        }

        function handleInputEnd() {
            firmaActiva = false;

            // Restaurar el comportamiento por defecto
            document.removeEventListener('touchmove', preventScroll);
            document.removeEventListener('mousemove', preventScroll);
        }

        // Agregar manejadores de eventos táctiles y de ratón al canvas
        canvas.addEventListener('mousedown', handleInputStart);
        canvas.addEventListener('mousemove', handleInputMove);
        canvas.addEventListener('mouseup', handleInputEnd);
        canvas.addEventListener('mouseleave', handleInputEnd);

        // Agregar manejadores de eventos táctiles al canvas
        canvas.addEventListener('touchstart', handleInputStart);
        canvas.addEventListener('touchmove', handleInputMove);
        canvas.addEventListener('touchend', handleInputEnd);
        canvas.addEventListener('touchcancel', handleInputEnd);

        document.getElementById('borrarFirma').addEventListener('click', function () {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            document.getElementById('firmaBase64').value = '';
        });
    </script>


    <script type="text/javascript">
        // Cargar la firma del usuario al cargar la página
        document.addEventListener('DOMContentLoaded', function () {
    fetch("{{ route('SistemaEscolar.empleados.cargar.firma') }}")
        .then(response => response.json())
        .then(data => {
            if (data.firma) {
                console.log(data);
                let canvas = document.getElementById('firmaCanvas');
                let ctx = canvas.getContext('2d');
                let img = new Image();
                img.src = data.firma; // Aquí estamos usando la URL completa
                img.onload = function () {
                    ctx.drawImage(img, 0, 0); // Ajusta la posición y tamaño si es necesario
                };
            }
        })
        .catch(error => console.error('Error:', error));
});



$(document).ready(function() {
    // returns true if every pixel's uint32 representation is 0 (or "blank")
function isCanvasBlank(canvas) {
  const context = canvas.getContext('2d');

  const pixelBuffer = new Uint32Array(
    context.getImageData(0, 0, canvas.width, canvas.height).data.buffer
  );

  return !pixelBuffer.some(color => color !== 0);
}

    // Agrega el evento al botón "Registrar" para enviar la firma a través de Ajax
    $('#registrarFirma').click(function () {
        var firmaDataURL = canvas.toDataURL('image/png');

        // Verifica si el canvas está vacío comparando la longitud
        if (isCanvasBlank(document.getElementById('firmaCanvas'))) { // Ajusta este valor si es necesario
            Swal.fire({
                icon: 'warning',
                title: 'Firma vacía',
                text: 'Por favor, dibuje su firma antes de registrar.',
                confirmButtonText: 'Aceptar'
            });
            return; // Detener la ejecución si el canvas está vacío
        }
        
        $('#firmaBase64').val(firmaDataURL); // Copia la firma en base64 al campo oculto

        // Datos a enviar
        var formData = {
            '_token': $('input[name=_token]').val(),
            'firmaBase64': firmaDataURL
        };

        // Realiza la solicitud Ajax
        $.ajax({
            type: 'POST',
            url: "{{ route('SistemaEscolar.empleados.actualizar.firma') }}",
            data: formData,
            success: function (response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Firma actualizada correctamente',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        // Recargar la página después de 1.5 segundos
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'La firma no se actualizó, hubo un error'
                    });
                }
            },
            error: function (xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Hubo un error al actualizar la firma, inténtelo más tarde'
                });
            }
        });
    });
});


        
    </script>
@endsection
