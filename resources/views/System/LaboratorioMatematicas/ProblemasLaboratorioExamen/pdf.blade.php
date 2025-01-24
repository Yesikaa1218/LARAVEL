@extends('layout.System.main')
@section('page_name', 'Laboratorio de matemáticas')

@section('styles-page')
<link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
<style>
    h1 {
        color: #000000;
        font-weight: bold;
    }
    p, font {
        color: #000000;
    }
    font {
        font-size: 22px;
    }
    p {
        font-weight: bold;
        font-size: 26px;
    }
    img {
        text-decoration: none;
        display: inline-block;
        max-width: 100%; /* Ensure images maintain their original size */
    }
    .problemas-redaccion, #text-problema {
        float: left;
    }
    form {
        width: 1100px;
    }
    .card {
        border: #FFFFFF;
    }
    .problemas {
        display: block;
        min-height: 90px;
    }
    .draggable {
        cursor: move;
    }
    .selected {
        border: 2px solid blue; /* Add a visual indicator for the selected image */
    }
    .btn-icon {
        margin-right: 5px;
    }
    .active {
        background-color: #007bff;
        color: white;
    }
    .cropper-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        padding-top: 60px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.4);
    }
    .modal-content {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 600px; /* Adjust the max-width to control the modal size */
    }
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }
    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
    #cropperModal button,
    #changeProblemModal button {
        margin-top: 10px;
    }
</style>
@endsection

@section('page-header')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="{{ route('sistema.laboratorio-matematicas.examen.index') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm">
        <i class="fas fa-arrow-left"></i> Regresar</a>
    <div>
        <button id="toggle-draggable" class="d-none d-sm-inline-block btn btn-secondary btn-icon"><i class="fas fa-arrows-alt"></i></button>
        <button id="toggle-resizable" class="d-none d-sm-inline-block btn btn-secondary btn-icon"><i class="fas fa-expand-arrows-alt"></i></button>
        <button id="toggle-snap" class="d-none d-sm-inline-block btn btn-secondary btn-icon"><i class="fas fa-magnet"></i></button>
        <button id="crop-image" class="d-none d-sm-inline-block btn btn-secondary btn-icon"><i class="fas fa-crop"></i></button>
        <button id="change-problem" class="d-none d-sm-inline-block btn btn-secondary btn-icon"><i class="fas fa-exchange-alt"></i></button>
        <button id="undo" class="d-none d-sm-inline-block btn btn-secondary btn-icon"><i class="fas fa-undo"></i></button>
        <button id="redo" class="d-none d-sm-inline-block btn btn-secondary btn-icon"><i class="fas fa-redo"></i></button>
        <button id="save-state" class="d-none d-sm-inline-block btn btn-secondary btn-icon"><i class="fas fa-save"></i></button>
        <button id="crear-pdf" class="d-none d-sm-inline-block btn btn-primary shadow-sm">
            <i class="fas fa-download"></i> Descargar examen</button>
    </div>
</div>
@endsection

@section('content')
<div class="d-sm-flex container-fluid">
    <form class="problemas-matematicas">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    @foreach($examen as $exa)
                        <h1 id="laboratorio">{{ $exa->nombre }}</h1>
                    @endforeach
                    <h1 id="materia">
                        @foreach($materiaLaboratorio as $ml)
                            {{ $ml->nombre }}
                        @endforeach
                    </h1>
                    @foreach($examen as $exa)
                        <h1 id="fecha">{{ $exa->periodo_academico }}</h1>
                    @endforeach
                </div>
                <br>
                @foreach($laboratorioInformacion as $li)
                    @foreach($temaMateria as $tm)
                        @if($li->tema_materia_id == $tm->id)
                            <div class="problema-tema">
                                @if($tm->titulo != '')
                                    <?php $i = 1; ?>
                                    <p id="titulo">{!! strip_tags($tm->titulo, '<sup><em><sub>') !!}
                                        @if($tm->id == 72)
                                            <img src="{{ asset('front/assets/images/system/laboratorio-13-II.jpg') }}" class="selectable draggable" data-id="img-{{ $tm->id }}">
                                        @endif
                                    </p>
                                    <br>
                                    @if($tm->id == 26)
                                        <center><img src="{{ asset('front/assets/images/system/datos-laboratorio.png') }}" class="selectable draggable" data-id="img-{{ $tm->id }}"></center>
                                    @endif
                                @endif
                                <div class="row mb-2">
                                    @foreach($problemaLaboratorioExamen as $problemaLaboratorioE)
                                        @foreach($problemaLaboratorio as $problemaL)
                                            @if($problemaLaboratorioE->problema_laboratorio_id == $problemaL->id && $problemaLaboratorioE->laboratorio_inf_id == $li->id)
                                                <div class="col-6 themed-grid-col problemas">
                                                    <font id="no-problema" class="selectable draggable" data-id="font-{{ $problemaL->id }}" data-problem-type-id="{{ $tm->id }}">{{ $i . ".-" }}</font>
                                                    <img src="/storage/{{ $problemaL->problema }}" class="selectable draggable" data-id="img-{{ $problemaL->id }}" data-problem-id="{{ $problemaL->id }}" data-problem-type-id="{{ $tm->id }}" style="max-width:485px;">
                                                </div>
                                                <?php $i++; ?>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    </form>
</div>

<!-- Modal for Image Cropping -->
<div id="cropperModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <img id="image-to-crop" src="" style="max-width: 100%;">
        <button id="crop-save" class="btn btn-primary">Recortar y guardar</button>
    </div>
</div>

<!-- Modal for Changing Problem -->
<div id="changeProblemModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <select id="problem-selector" class="form-control"></select>
        <img id="problem-preview" src="" alt="Vista previa del problema seleccionado" style="max-width: 100%; margin-top: 10px;">
        <button id="change-problem-save" class="btn btn-primary">Cambiar problema</button>
    </div>
</div>
@endsection

@section('scripts-page')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
<script type="text/javascript">
    var urlActual = window.location.href;
    var segmentos = urlActual.split('/');
    var idLab = segmentos[6]; // Ajusta el índice según la posición del ID en tu URL

console.log("ID:", idLab);

    $(function() {
        let selectedElement;
        let isDraggableActive = false;
        let isResizableActive = false;
        let isSnapActive = false;
        let history = [];
        let future = [];
        let cropper;
        let problemaLaboratorio = @json($problemaLaboratorio);
        // Variable para guardar la posición y tamaño original del elemento seleccionado
        let originalPosition = {}; let originalSize = {};
        let selectedProblem;

        function saveHistory() {
            const state = [];
            $(".selectable").each(function() {
                const $this = $(this);
                state.push({
                    id: $this.data("id"),
                    tipo: $this.prop("tagName").toLowerCase(),
                    src: $this.attr("src"),
                    width: $this.width(),
                    height: $this.height(),
                    top: $this.css("top") !== 'auto' ? $this.css("top") : null,
                    left: $this.css("left") !== 'auto' ? $this.css("left") : null
                });
            });
            history.push(state);
            future = []; // Clear the future when a new state is saved
        }

        //Esta funcion deteca si hay overlap entre objetos
        function isOverlapping(el1, el2) {
            const rect1 = el1.getBoundingClientRect();
            const rect2 = el2.getBoundingClientRect();

            return !(rect1.right < rect2.left || 
                rect1.left > rect2.right || 
                rect1.bottom < rect2.top || 
                rect1.top > rect2.bottom);
        }

        //Se hace llamar para activar el arrastre del objeto
        function activarArrastre(element) {
            //Apagar el redimensionado si esta activo
            if(isResizableActive){
                isResizableActive = false;
                $("#toggle-resizable").removeClass("active");
                if(selectedElement){
                    $(selectedElement).resizable("destroy");
                }
            }

            $(element).draggable({
                grid: isSnapActive ? [20, 20] : false,
                snap: isSnapActive,
                snapTolerance: 20,
                snapMode: 'both',
            //Al comenzar el arrastre, se guarda la posicion original
                start: function(event, ui) {
                    originalPosition = {
                        top: $(this).css('top'),
                        left: $(this).css('left')
                    };
                },
            //Al dejar de arrastrar se va a revisar si hubo sobreposicion
                stop: function(event, ui) {
                    checkOverlap($(this),"draggable");
                }
            });        
        }

        //Activar el redimensionado
        function activarRedimensionado(element){
            //Desactivar arrastre si esta activo
            if(isDraggableActive){
                isDraggableActive = false;
                $("#toggle-draggable").removeClass("active");
                if(selectedElement){
                    $(selectedElement).draggable("destroy");
                }
            }

            $(element).resizable({
                start: function(event, ui) {
                //Guardar el tamaño original del elemento
                    originalSize = {
                        width: $(this).width(),
                        height: $(this).height()
                    };
                }
            });         
        }

        //Funcion para actualizar el estado del elemento seleccionado
        function actualizarEstadoSeleccionado(element){
            if(isDraggableActive){
                activarArrastre(element);
            }
            if(isResizableActive){
                activarRedimensionado(element);
            }
        }

        //Esta funcion va a revisar si hay superposicon entre los elementos
        function checkOverlap(selected, option) {
            //Se crea una bandera para hacer la validacion
            let overlapDetected = false;
            //Se recorren todos los elementos que se pueden seleccionar
            $(".selectable").each(function() {
                //Se ignora en la validación el elemento seleccionado
                //Para evitar que siempre marque sobreposicion consigo mismo
                if (this !== selected[0]) {
                    //Se llama a la funcion que revisa las posiciones
                    if (isOverlapping(selected[0], this)) {
                        overlapDetected = true;
                    }
                }
            });

            //Si se detectó que hubo sobreposición entonces se regresa el objeto al punto inicial.
            if (overlapDetected && option=="draggable") {
                selected.css({
                    top: originalPosition.top,
                    left: originalPosition.left
                });
            }
            if(overlapDetected && option=="resize"){
                selected.css({
                    width: originalSize.width,
                    height: originalSize.height
                });
            }
            
            return overlapDetected;
        }

        $(".selectable").on("click", function() {
            //Si hay un objeto seleccionado previamente, entonces se elimina la clase selected, y las funcionalidades
            if (selectedElement) {
                $(selectedElement).removeClass("selected");
                if (isDraggableActive) $(selectedElement).draggable("destroy");
                if (isResizableActive) $(selectedElement).resizable("destroy");
            }

            //Ahora seleccionamos el nuevo objeto que el cursor apuntó
            selectedElement = this;
            $(this).addClass("selected");
            
            actualizarEstadoSeleccionado(this);
            saveHistory();
        });

        $("#toggle-draggable").on("click", function() {
            //Se intercambia el estado al contrario cada vez que se hace click.
            isDraggableActive = !isDraggableActive;
            $(this).toggleClass("active");
            //Si hay un objeto seleccionado, revisa si esta activa la bandera del arrastre
            if (selectedElement) {
                if (isDraggableActive) {
                    //Entonces se llama a la funcion para arrastrar al objet0o0 seleccionado
                    activarArrastre(selectedElement);
                } else {
                    //De lo contrario se quita la clase de arrastre en el elemento
                    $(selectedElement).draggable("destroy");
                }
            }
        });

        $("#toggle-resizable").on("click", function() {
            //Se intercambia el estado al contrario cada vez que se hace click.
            isResizableActive = !isResizableActive;
            $(this).toggleClass("active");
            //Si hay un objeto seleccionado, revisa si esta activa la bandera de redimensionar
            if (selectedElement) {
                if (isResizableActive) {
                    //Entonces se llama a la funcion para redimensionar el objeto seleccionado
                    activarRedimensionado(selectedElement);
                } else {
                    $(selectedElement).resizable("destroy");
                }
            }
        });        

        $("#toggle-snap").on("click", function() {
            isSnapActive = !isSnapActive;
            $(this).toggleClass("active");
            if (selectedElement && isDraggableActive) {
                $(selectedElement).draggable("option", "grid", isSnapActive ? [20, 20] : false);
                $(selectedElement).draggable("option", "snap", isSnapActive);
            }
        });

        $("#save-state").on("click", function() {
            const state = [];
            $(".selectable").each(function() {
                const $this = $(this);
                state.push({
                    id: $this.data("id"),
                    tipo: $this.prop("tagName").toLowerCase(),
                    src: $this.attr("src"),
                    width: $this.width(),
                    height: $this.height(),
                    top: $this.css("top"),
                    left: $this.css("left")
                });
            });

            var urlGuardarConfiguracion = "{{ route('sistema.laboratorio-matematicas.laboratorio.guardarConfiguracion', ['laboratorioId' => ':idLab']) }}".replace(':idLab', idLab);
            
            $.ajax({
                url: urlGuardarConfiguracion,
                method: 'POST',
                data: {
                    configuraciones: state
                },
                success: function(response) {
                    Swal.fire({
                                title: 'Éxito',
                                text: 'Se ha guardado correctamente la información.',
                                icon: 'success',
                                confirmButtonText: 'Aceptar',
                                allowOutsideClick: false,
                            });
                    //alert("¡Estado guardado!");
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                                title: 'Error',
                                text: 'Hubo un error al guardar la informacion: '+ error,
                                icon: 'error',
                                confirmButtonText: 'Aceptar',
                                allowOutsideClick: false,
                            });
                    //alert('Error al guardar la configuración: '+ error);
                }
            });
        });

        function loadState() {
            var urlCargarConfiguracion = `{{ route('sistema.laboratorio-matematicas.laboratorio.cargarConfiguracion', ['laboratorioId' => ':idLab']) }}`.replace(':idLab', idLab);
            $.ajax({
                url: urlCargarConfiguracion,
                method: 'GET',
                success: function(response) {
                    if (response.status === 'success') {
                        response.data.forEach(function(config) {
                            const element = $(`[data-id='${config.elemento_id}']`);
                            if (element.length) {
                                // Si el elemento es una imagen, establece el src
                                if (element.is('img') && config.src) {
                                    element.attr('src', `${config.src}`);
                                }

                                const cssProperties = {
                                    width: config.width,
                                    height: config.height
                                };                                           
                                if(config.posicion_left !== "auto" || config.posicion_top !== "auto"){
                                    cssProperties.position = "absolute";
                                    cssProperties.top = config.posicion_top;                 
                                    cssProperties.left = config.posicion_left;
                                }
                                element.css(cssProperties);
                            }
                        });
                        //console.log(response.data);
                    } else {
                    console.error('Error en la respuesta:', response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error al cargar la configuración:', error);
                }
            });
        }

        function applyState(state) {
            state.forEach(function(config) {
                const element = $(`[data-id='${config.id}']`);
                if (element.length) {
                    element.attr("src", config.src);
            
                    const cssProperties = {
                        width: config.width,
                        height: config.height
                    };

                    // Aplica solo si no son null, y resetea a 'auto' si es necesario
                    if (config.top !== null && config.left !== null) {
                        cssProperties.position = "absolute";
                        cssProperties.top = config.top;
                        cssProperties.left = config.left;
                    } else {
                        cssProperties.position = "";
                        cssProperties.top = "";
                        cssProperties.left = "";
                    }
                    element.css(cssProperties);
                }
            });
        }

        $("#undo").on("click", function() {
            if (history.length > 0) {
                const currentState = history.pop();
                future.push(currentState);
                const previousState = history[history.length - 1];
                if (previousState) {
                    applyState(previousState);
                }
            }
        });

        $("#redo").on("click", function() {
            if (future.length > 0) {
                const nextState = future.pop();
                history.push(nextState);
                applyState(nextState);
            }
        });

        $(document).keydown(function(e) {
            if (e.ctrlKey && e.key === 'z') {
                $("#undo").click();
            }
            if (e.ctrlKey && e.key === 'y') {
                $("#redo").click();
            }
        });

        
        $(document).ready(function() {
    loadState();
    
    $(document).click(function(event) {
        if (!$(event.target).closest('.selectable').length) {
            if (selectedElement) {
                $(selectedElement).removeClass("selected");
                if (isDraggableActive) $(selectedElement).draggable("destroy");
                if (isResizableActive) $(selectedElement).resizable("destroy");
                selectedElement = null;
            }
        }
    });

    // Función para desactivar botones no compatibles
function deactivateOtherButtons(activeButton) {
    // Botones a verificar
    const buttons = ["draggable", "resizable", "snap", "crop"];

    // Iteramos sobre los botones
    buttons.forEach(function(button) {
        if (button !== activeButton) {
            if (button === "draggable" && isDraggableActive) {
                isDraggableActive = false;
                $("#toggle-draggable").removeClass("active");
                if (selectedElement) {
                    $(selectedElement).draggable("destroy");
                }
            }

            if (button === "resizable" && isResizableActive) {
                isResizableActive = false;
                $("#toggle-resizable").removeClass("active");
                if (selectedElement) {
                    $(selectedElement).resizable("destroy");
                }
                
            }

            if (button === "snap" && isSnapActive) {
                isSnapActive = false;
                $("#toggle-snap").removeClass("active");
                if (selectedElement && isDraggableActive) {
                    $(selectedElement).draggable("destroy"); // Destruir draggable con snap
                    activateDrag(); // Reactivar draggable sin snap
                }
            }

            if (button === "crop" && isCroppingActive) {
                isCroppingActive = false;
                $("#toggle-crop").removeClass("active");
                if (cropper) {
                    cropper.destroy(); // Destruir el cropper
                    cropper = null;
                }
                // Cierra el modal si aún está abierto
                const modal = document.getElementById("cropperModal");
                if (modal) modal.style.display = "none";
                
            }
        }
    });
}


    // Función para manejar el movimiento de las imágenes
    function activateDrag() {
        if (selectedElement) {
            $(selectedElement).draggable({
                grid: isSnapActive ? [20, 20] : false,
                snap: isSnapActive
            });
        }
    }

    // Función para manejar el redimensionamiento de las imágenes
    function activateResize() {
        if (selectedElement) {
            $(selectedElement).resizable();
        }
    }

 /* Código para recortar una imagen */
 function cropImage() {
            if (selectedElement) {
                const $image = $(selectedElement);
                $('#image-to-crop').attr('src', $image.attr('src'));
                const modal = document.getElementById("cropperModal");
                const span = document.getElementsByClassName("close")[0];
                const cropButton = document.getElementById("crop-save");

                modal.style.display = "block";

                span.onclick = function() {
                    modal.style.display = "none";
                    if (cropper) {
                        cropper.destroy();
                        cropper = null;
                    }
                }

                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                        if (cropper) {
                            cropper.destroy();
                            cropper = null;
                        }
                    }
                }

                const image = document.getElementById('image-to-crop');
                cropper = new Cropper(image, {
                    aspectRatio: NaN,
                    viewMode: 1,
                    autoCropArea: 1
                });

                cropButton.onclick = function() {
                    const croppedCanvas = cropper.getCroppedCanvas();
                    const croppedImage = croppedCanvas.toDataURL();
                    $image.attr('src', croppedImage);
                    modal.style.display = "none";
                    if (cropper) {
                        cropper.destroy();
                        cropper = null;
                    }
                    saveHistory();
                }

                $(document).on("keydown", function(e) {
                    if (e.key === "Enter") {
                        cropButton.click();
                    }
                });
            }
        }

        $("#crop-image").on("click", function() {
            cropImage();
        });

    // Función para manejar la selección de una imagen
    $(".selectable").on("click", function() {
        // Si ya hay un elemento seleccionado, lo deseleccionamos
        if (selectedElement) {
            $(selectedElement).removeClass("selected");
        }

        // Seleccionamos el nuevo elemento
        selectedElement = this;
        $(this).addClass("selected");

        // Activamos la acción correspondiente
        if (isDraggableActive) {
            activateDrag();
        }
        if (isResizableActive) {
            activateResize();
        }
        if (isCroppingActive) {
            activateCrop();
        }

        saveHistory();
    });

            /* Código para cambiar problema */
            function changeProblem() {
            if (selectedElement) {
                const problemTypeId = $(selectedElement).data('problem-type-id');
                if (problemTypeId) {
                    var urlProblemas = `{{ route('sistema.laboratorio-matematicas.problemaLaboratorio.getProblemsByType',':problemTypeId') }}`.replace(':problemTypeId',problemTypeId);
                    $.ajax({
                        //url: `/sistema/laboratorio-matematicas/problemaLaboratorio/getProblemsByType/${problemTypeId}`,
                        url: urlProblemas,
                        type: 'GET',
                        success: function(data) {
                            const problemSelector = $('#problem-selector');
                            problemSelector.empty();
                            data.forEach(problem => {
                                problemSelector.append(new Option(problem.nombre, problem.id));
                            });

                        // Si hay un problema seleccionado previamente, seleccionarlo en el dropdown
                        if (selectedProblem) {
                            problemSelector.val($(selectedProblem).data('problem-id'));
                            const selectedProblemId = problemSelector.val();
                            const selectedProblemData = data.find(problem => problem.id == selectedProblemId);
                            if (selectedProblemData) {
                                $('#problem-preview').attr('src', `/storage/${selectedProblemData.problema}`);
                            }
                        }

                            // Actualizar vista previa del problema seleccionado
                            problemSelector.on('change', function() {
                                const selectedProblemId = $(this).val();
                                if (selectedProblemId) {
                                    const selectedProblem = data.find(problem => problem.id == selectedProblemId);
                                    if (selectedProblem) {
                                        $('#problem-preview').attr('src', `/storage/${selectedProblem.problema}`);
                                    }
                                }
                            });

                            $('#changeProblemModal').show();
                        },
                        error: function(error) {
                            console.error('Error fetching problems:', error);
                        }
                    });
                }
            }
        }

        $("#change-problem").on("click", function() {
            selectedProblem = selectedElement;
            changeProblem();
        });

        //Esta funcion se utiliza para revisar si ya se esta usando la imagen en la pagina antes de ponerla y evitar duplicados.
        function isProblemAlreadyUsed(newSrc) {
            let isUsed = false;
            $("img.selectable").each(function() {
                if ($(this).attr('src') === newSrc) {
                    isUsed = true;
                    return false; // salir del bucle si se encuentra una coincidencia
                }
            });
            return isUsed;
        }


        $("#change-problem-save").on("click", function() {
            const newProblemId = $('#problem-selector').val();
            //alert(selectedElement);
            if (newProblemId && selectedProblem) {
                const getProblemImageUrl = `{{ route('sistema.laboratorio-matematicas.problemaLaboratorio.getProblemImage', ':id') }}`.replace(':id',newProblemId);
                $.ajax({
                    //url: `/sistema/laboratorio-matematicas/problemaLaboratorio/getProblemImage/${newProblemId}`,
                    url: getProblemImageUrl,
                    type: 'GET',
                    success: function(data) {
                        const newSrc = `/storage/${data.problema}`;
                        if (isProblemAlreadyUsed(newSrc)) {
                            Swal.fire({
                                title: 'Duplicado',
                                text: 'Este problema ya se encuentra en la pagina, favor de seleccionar otro.',
                                icon: 'info',
                                confirmButtonText: 'Aceptar',
                                allowOutsideClick: false,
                            });
                           // alert("Este problema ya se encuentra en la pagina.");
                        } else {
                            $(selectedProblem).attr('src', `/storage/${data.problema}`);
                            $('#changeProblemModal').hide();
                            saveHistory();
                        }

                    },
                    error: function(error) {
                        console.error('Error fetching problem image:', error);
                    }
                });
            }
        });


        $(".close").on("click", function() {
            $(this).closest('.modal').hide();
        });

        /* Código para exportar una vista a PDF */
        var btnpdf = document.getElementById('crear-pdf');
        btnpdf.onclick = function() {
            var doc = new window['jspdf'].jsPDF('p', 'pt', 'a4');
            var margin = 20;
            var scale = ((doc.internal.pageSize.width - margin * 2) / document.body.scrollWidth) + 0.1;
            doc.html(document.querySelector('.problemas-matematicas'), {
                x: margin,
                y: margin,
                html2canvas: {
                    //logging: true,
                    letterRendering: true // Mejora la calidad del texto
                },
                callback: function(doc){
                    doc.save('Laboratorio.pdf');
                }
            });
        }
    });
});

</script>
@endsection









