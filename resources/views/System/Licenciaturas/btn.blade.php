<a class="btn btn-primary btn-sm">Confirmar</a>
<a href="{{route('sistema.licenciaturas.licenciatura.edit', $id)}}" class="btn btn-success btn-sm" >Editar</a>
<!--<form
    {{-- action="{{route('sistema.licenciaturas.licenciatura.destroy', ['licenciatura' => $id])}}" --}}
    class="d-inline formdelete" method="POST">
    {{-- @method('DELETE')
    @csrf --}}

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
-->