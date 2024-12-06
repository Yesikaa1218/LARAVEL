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
            ['align', ['align', 'style']],
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

