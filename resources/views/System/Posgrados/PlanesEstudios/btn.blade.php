<!-- Falta cambiar rutas -->

<a href="{{route('sistema.posgrados.materias.index', $id)}}" class="btn btn-info btn-sm" >Unidades de Aprendizaje</a>

<a href="{{route('sistema.posgrados.planes-posgrado.edit', $id)}}" class="btn btn-success btn-sm" >Editar</a>

<form
    action="{{route('sistema.posgrados.planes-posgrado.destroy', ['planes_estudio_posgrado' => $id])}}"
    class="d-inline formdelete" method="POST">
    @method('DELETE')
    @csrf
    <button class="btn btn-sm btn-danger" type="submit">Eliminar
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



</script>