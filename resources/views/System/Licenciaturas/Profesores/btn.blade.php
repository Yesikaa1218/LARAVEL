@hasanyrole('SuperAdmin')
@IF($active == 0)
<!--{{route('sistema.licenciaturas.profesores.approve', $id)}}-->
<form
    action="{{route('sistema.licenciaturas.profesores.approve', $id)}}"
    class="d-inline formapprove " method="POST">
    @method('PUT')
    @csrf
    <button class="btn btn-primary btn-sm" type="submit">Aprobar
    </button>
</form>
@endif 
@endhasanyrole
<a href="{{route('sistema.licenciaturas.profesores.edit', $id)}}" class="btn btn-success btn-sm" >Editar</a>

<form
    action="{{route('sistema.licenciaturas.profesores.destroy', ['profesore' => $id])}}"
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

    $('.formapprove').submit(function(e){
        e.preventDefault();
        Swal.fire({
            title: '¿Seguro que deseas aprobar el registro?',
            text: "Una vez aprobada, la información se verá reflejada en el sitio web",
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