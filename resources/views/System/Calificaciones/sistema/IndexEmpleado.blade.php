<?php
use Illuminate\Support\Facades\Storage;
?>
@extends('layout.System.SistemaEscolar.main')
@section('page_name', 'Empleados')
@section('page-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Empleados</h1>
        <a href="{{ route('SistemaEscolar.empleados.create') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i> Registrar Empleado</a>
    <!-- Botón que lanza el modal  -->
    <a href="#archivoModal" role="button" class="btn btn-primary" data-toggle="modal">Subir Excel</a>
        
    <!-- Modal / Ventana / Overlay en HTML -->
    <div id="archivoModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Selecciona el Archivo Excel</h3>
                </div>
                <div class="modal-body">
                        <!-- Formulario para cargar el archivo Excel -->
                    <form action="{{ route('procesarArchivo') }}" method="POST" enctype="multipart/form-data" class="mt-4">
                        @csrf
                        <div class="form-group">
                            <label for="file">Selecciona el archivo Excel</label>
                            <input type="file" name="file" accept=".xlsx, .xls, .csv" required>
                            <button type="submit" class="btn btn-primary">Importar</button>
                        </div> 
                    </form>
                    <p class="text-warning"><small>Solamente puedes seleccionar formatos xls y xlsx.</small></p>
                </div>
                <div class="modal-footer">   
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
@section('content')
    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lista de Empleados</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table id="data" class="table table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th>No.</th>
                            <th>No. Empleado</th>
                            <th>Nombre</th>
                            <th>Fecha de Registro</th>
                            <th>Estatus</th>                      
                            <th width="150px">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
       
    </div>
@endsection

@section('scripts-page')
    <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            // Inicializa la tabla DataTables
            var dataTable = $('#data').DataTable();
            var idEmpleado;

            //Botones
            $('#data').on('click','.EditarBtn',function(){
                
                var fila = dataTable.row($(this).closest('tr')).data();
                idEmpleado = fila[0];
                var url = '{{ route("SistemaEscolar.empleados.modificar", ["id" => ":id"]) }}'.replace(':id', idEmpleado);
                // Redirigir a una nueva página
                window.location.href = url;
            });

            $('#data').on('click', '.EliminarBtn', function () {
                var fila = dataTable.row($(this).closest('tr')).data();
                id = fila[0];
                eliminar(id);
            });

            // Luego, tu código para llenar la tabla DataTables
            $.ajax({
                url: "{{ route('SistemaEscolar.empleados.get') }}",
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    const options = { year: 'numeric', month: '2-digit', day: '2-digit'};
                    
                    // Itera sobre los datos y agrega cada fila a la tabla
                    $.each(data, function (index, item) {
                        
                        var fecha = new Date(item.created_at);
                        var estatus = "";
                        var botones = '<button type="button" title="Editar" class="btn btn-primary EditarBtn" style="display: inline-block; margin: 5px;"><i class="fas fa-pencil-alt"></i></button>' + 
                            '<button type="button" title="Eliminar" class="btn btn-danger EliminarBtn" style="display: inline-block; margin: 5px;"><i class="fas fa-trash"></i></button>';
                        if(item.Activo == 0){
                            estatus = "No Activo";
                        }else{
                            estatus = "Activo"
                        }
                        var nombreCompleto = item.Nombre + ' ' + item.ApPaterno + ' ' +item.ApMaterno;
                        dataTable.row.add([
                            item.id,
                            item.NoEmpleado,
                            nombreCompleto,
                            fecha.toLocaleString('es-ES', options),
                            estatus,
                            botones
                        ]).draw();
                    });
                }
            });
            function eliminar(id) {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: '¿Deseas dar de baja a este registro con folio: ' + id + ' ?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, dar de baja',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var _url = '{{ route("SistemaEscolar.empleados.delete", ["id" => ":id"]) }}';
                        _url = _url.replace(':id', id);

                        $.ajax({
                            type: 'PATCH', // Método HTTP para la baja lógica
                            url: _url,
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Éxito',
                                        text: 'Registro dado de baja con éxito',
                                    });

                                    // Elimina la fila de la tabla
                                    var filar = $('#data').find('td:contains("' + id + '")').closest('tr');
                                    dataTable.row(filar).remove().draw();
                                    
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: 'Error en la operación: ' + JSON.stringify(response.errors),
                                    });
                                }
                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Error en la solicitud AJAX: ' + error,
                                });
                            }
                        });
                    }
                });
            }
        });

       

    </script>

@endsection