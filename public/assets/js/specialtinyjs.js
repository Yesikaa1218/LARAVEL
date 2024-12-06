/* tinymce.init({
    selector: '.content_page',
    plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist mediaembed pageembed permanentpen powerpaste table advtable  tinymcespellchecker image code media link wordcount',
    toolbar: 'insertfile undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print |    template link anchor codesample | ltr rtl | table | image code | wordcount',
    height: 600,
    image_title: true,
    automatic_uploads: true,
    relative_urls: false,
    remove_script_host: false,
    images_upload_url: "/sistema/upload-images",
    file_picker_types: 'image',
    file_picker_callback: function(cb, value, meta) {
        var input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');
        input.onchange = function() {
            var file = this.files[0];

            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function () {
                var id = 'blobid' + (new Date()).getTime();
                var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                var base64 = reader.result.split(',')[1];
                var blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);
                cb(blobInfo.blobUri(), { title: file.name });
            };
        };
        input.click();
    },
    toolbar_mode: 'sliding',
    language: 'es_MX',
    height: 700,
    toolbar_sticky: true,
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    spellchecker_language: 'es_MX',
}); */

/* tinymce.PluginManager.add('ButtonPlugin', function(editor) {
    editor.ui.registry.addButton('customButton', {
        text: "Agregar botón",
        tooltip: 'Insertar Botón con Enlace',
        onAction: function() {
            Swal.fire({
                title: 'Ingrese el enlace y el texto del botón',
                html:
                '<div style="width: 90%;">' + // Establece un ancho fijo para el contenido del modal
                '<input id="swal-input1" class="swal2-input form-control" placeholder="Enlace">' +
                '<input id="swal-input2" class="swal2-input form-control" placeholder="Texto del botón">' +
                '</div>',
                focusConfirm: false,
                preConfirm: () => {
                    const url = Swal.getPopup().querySelector('#swal-input1').value;
                    const texto = Swal.getPopup().querySelector('#swal-input2').value;
                    if (!url || !texto) {
                        Swal.showValidationMessage(`Por favor, complete todos los campos`);
                    }
                    return { url: url, texto: texto };
                },
                customClass: {
                    container: 'sweet-container', // Agrega una clase personalizada al contenedor del modal
                    input: 'form-control',
                    confirmButton: '', // Elimina el estilo predeterminado 'swal2-styled'
                    cancelButton: 'btn btn-secondary'
                },
                showCancelButton: true,
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar',
                onOpen: () => {
                    // Aplicar color de fondo azul al botón "Aceptar" cuando el modal se abre
                    Swal.getConfirmButton().style.backgroundColor = '#007bff';
                },
                width: 'auto' // Usa un ancho automático para el modal
            }).then((result) => {
                if (result.isConfirmed) {
                    var buttonHTML = '<a href="' + result.value.url + '"><button class="btn btn-primary">'+ result.value.texto +'</button></a>';
                    editor.insertContent(buttonHTML);
                }
            });
        }
    });
});

tinymce.init({
    selector: '.content_page',
    plugins: 'ButtonPlugin a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist mediaembed pageembed permanentpen powerpaste table advtable  tinymcespellchecker image code media link wordcount',
toolbar: 'insertfile undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print |    template link anchor codesample | ltr rtl | table | image code | wordcount | customButton',
    height: 600,
    image_title: true,
    automatic_uploads: true,
    relative_urls: false,
    remove_script_host: false,
    images_upload_url: "/sistema/upload-images",
    file_picker_types: 'image',
    file_picker_callback: function(cb, value, meta) {
        var input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');
        input.onchange = function() {
            var file = this.files[0];

            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function () {
                var id = 'blobid' + (new Date()).getTime();
                var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                var base64 = reader.result.split(',')[1];
                var blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);
                cb(blobInfo.blobUri(), { title: file.name });
            };
        };
        input.click();
    },
    toolbar_mode: 'sliding',
    language: 'es_MX',
    height: 700,
    toolbar_sticky: true,
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    spellchecker_language: 'es_MX',
}); */
$(document).ready(function() {

    $('#actualizar_btn').click(function(event) {
        event.preventDefault(); // Evitar el envío del formulario por defecto

        // Obtener el contenido HTML del campo content_page
        var contentHtml = $('#content_page').val();
        //console.log(contentHtml);
        // Realizar la solicitud AJAX
        $.ajax({
            url: _url,
            method: "POST",
            data: {
                content_page: contentHtml // Enviar solo el contenido HTML
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Agregar token CSRF
            },
            success: function(response) {
                // Manejar la respuesta del servidor
                //console.log(response);
                // Por ejemplo, mostrar un mensaje de éxito o redirigir a otra página
                alert('Registro agregado correctamente');
                window.location.href = _return;
            },
            error: function(xhr, status, error) {
                // Manejar errores de la solicitud AJAX
                console.error(xhr.responseText);
                // Por ejemplo, mostrar un mensaje de error al usuario
                alert('Hubo un error al agregar el registro. Por favor, inténtelo de nuevo.');
            }
        });
    });

    $('.content_page').summernote({
        height: 600,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'strikethrough']],
            ['font', ['fontname', 'fontsize', 'color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['style', ['style']],
            ['insert', ['link', 'table', 'hr', 'image']],
            ['view', ['fullscreen', 'codeview']],
            ['custom', ['buttonWithLink']]
        ],
        buttons: {
            buttonWithLink: function(context) {
                var button = $.summernote.ui.button({
                    contents: '<i class="fa fa-hand-pointer-o"/> Agregar botón',
                    tooltip: 'Insertar Botón con Enlace',
                    click: function() {
                        var cursorPosition = $('.content_page').summernote('getCursorPosition');
                        Swal.fire({
                            title: 'Ingrese el enlace y el texto del botón',
                            html:
                                '<div style="width: 90%;">' +
                                '<input id="swal-input1" class="swal2-input form-control" placeholder="Texto del botón">' +
                                '<input id="swal-input2" class="swal2-input form-control" placeholder="Enlace">' +
                                '</div>',
                            focusConfirm: false,
                            showCancelButton: true,
                            confirmButtonText: 'Aceptar',
                            cancelButtonText: 'Cancelar',
                            preConfirm: () => {
                                const texto = Swal.getPopup().querySelector('#swal-input1').value;
                                const url = Swal.getPopup().querySelector('#swal-input2').value;
                                if (!url || !texto) {
                                    Swal.showValidationMessage(`Por favor, complete todos los campos`);
                                }
                                return { texto: texto, url: url };
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                var buttonHTML = '<a href="' + result.value.url + '"><button class="btn btn-primary">' + result.value.texto + '</button></a>';
                                $('.content_page').summernote('restoreCursorPosition');
                                $('.content_page').summernote('pasteHTML', buttonHTML);
                            }
                        });
                        $('.content_page').summernote('focus');
                        $('.content_page').summernote('moveCursor', cursorPosition);
                    }
                });
                return button.render();
            }
        }
    });
    


});

