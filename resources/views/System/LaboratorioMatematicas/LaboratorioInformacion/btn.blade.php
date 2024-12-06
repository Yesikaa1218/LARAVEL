<a href="{{route('sistema.laboratorio-matematicas.laboratorio-informacion.edit', ['examenId' => $examen_id, 'id' => $id])}}" class="btn btn-success btn-sm" >Editar</a>
<form
    action="{{route('sistema.laboratorio-matematicas.laboratorio-informacion.destroy', ['examenId' => $examen_id, 'id' => $id])}}"
    class="d-inline formdelete" method="POST"> 
    @method('DELETE')
    @csrf
    <button class="btn btn-sm btn-danger" type="submit">Eliminar
    </button>
</form>
<a href="{{route('sistema.laboratorio-matematicas.laboratorio-informacion.problemaLaboratorio', ['examenId' => $examen_id, 'id' => $id])}}" class="btn btn-info btn-sm">Generar problemas</a>
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