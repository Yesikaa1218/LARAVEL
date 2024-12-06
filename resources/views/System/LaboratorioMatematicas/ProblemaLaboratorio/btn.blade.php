
<a href="{{route('sistema.laboratorio-matematicas.problemaLaboratorio.fotoProblema', $id)}}" class="btn btn-primary btn-sm">Ver</a>
<a href="{{route('sistema.laboratorio-matematicas.problemaLaboratorio.edit', $id)}}" class="btn btn-success btn-sm" >Editar</a>
<form
    action="{{route('sistema.laboratorio-matematicas.problemaLaboratorio.destroy', ['problemaLaboratorio' => $id])}}"
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