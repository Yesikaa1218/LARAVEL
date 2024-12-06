@hasanyrole('SuperAdmin')
@endhasanyrole


<a href="{{route('sistema.semestres.edit', $id)}}" class="btn btn-success btn-sm" >Editar</a>
<form
    action="{{route('sistema.semestres.destroy', ['semestre' => $id])}}"
    class="d-inline formdelete" method="POST">
    @method('DELETE')
    @csrf
    <button class="btn btn-sm btn-danger" type="submit">Eliminar
    </button>
</form>
<form
    action="{{route('sistema.escolar.semestre.actualizar', $id)}}"
    class="d-inline formupdate" method="POST">
    @method('PUT')
    @csrf
    <button class="btn btn-sm {{ $seleccionado == 1 ? 'btn-primary' : 'btn-secondary' }}" type="submit">
        @if ($seleccionado == 1)
            Seleccionado
        @else
            Seleccionar
        @endif
    </button>
</form>
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

    $('.formupdate').submit(function(e){
        e.preventDefault();
        Swal.fire({
            title: '¿Seguro que deseas seleccionar este Semestre?',
            text: "Se cambiarán todos los indices de la página principal y licenciaturas.",
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
