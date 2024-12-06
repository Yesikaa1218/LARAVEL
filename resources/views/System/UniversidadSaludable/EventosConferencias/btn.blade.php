@hasanyrole('SuperAdmin')
@if($active == 0)
<form
    action="{{route('sistema.universidad-saludable-eventos.approve', $id)}}"
    class="d-inline formapprove" method="POST">
    @method('PUT')
    @csrf
    <button class="btn btn-primary btn-sm" type="submit">Aprobar
    </button>
</form>
@endif
@endhasanyrole
<a href="{{route('sistema.universidad-saludable-eventos.edit', $id)}}" class="btn btn-success btn-sm" >Editar</a>
<form
    action="{{route('sistema.universidad-saludable-eventos.destroy', ['universidad_saludable_evento' => $id])}}"
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
