@hasanyrole('SuperAdmin')
@if($active == 0)
<form
    action="{{route('sistema.laboratorio-matematicas.examen.approve', $id)}}"
    class="d-inline formapprove" method="POST">
    @method('PUT')
    @csrf
    <button class="btn btn-primary btn-sm" type="submit">Aprobar</button>
</form>
@endif
@endhasanyrole
<a href="{{route('sistema.laboratorio-matematicas.examen.edit', $id)}}" class="btn btn-success btn-sm" >Editar</a>
<form
    action="{{route('sistema.laboratorio-matematicas.examen.destroy', ['examan' => $id])}}"
    class="d-inline formdelete" method="POST">
    @method('DELETE')
    @csrf
    <button class="btn btn-sm btn-danger" type="submit">Eliminar</button>
</form>
<a href="{{route('sistema.laboratorio-matematicas.laboratorio-informacion.index', $id)}}" class="btn btn-info btn-sm">Agregar problemas</a> 
<a href="{{route('sistema.laboratorio-matematicas.problemasLaboratorioExamen.pdf', $id)}}" class="btn btn-secondary btn-sm">Ver laboratorio</a>
<script>
    $('.formdelete').submit(function(e){
        e.preventDefault();
        Swal.fire({
            title: '¿Seguro que deseas eliminar el registro?',
            text: "No se podrá recuperar la información eliminada",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#1cc88a',
            cancelButtonColor: '#e74a3b',
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })
    });

    $('.formapprove').submit(function(e){
        e.preventDefault();
        Swal.fire({
            title: '¿Seguro que deseas aprobar el registro?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#1cc88a',
            cancelButtonColor: '#e74a3b',
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })
    });
</script>
