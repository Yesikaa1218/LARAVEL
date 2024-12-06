@hasanyrole('SuperAdmin')
@if($active == 0)
<form
    action="{{route('sistema.asesorias.laboratorios.approve', $id)}}"
    class="d-inline formapprove" method="POST">
    @method('PUT')
    @csrf
    <button class="btn btn-primary btn-sm data" type="submit">Aprobar
    </button>
</form>
@endif
@endhasanyrole

{{-- <a class="btn btn-primary btn-sm">Confirmar</a> --}}
<a class="btn btn-outline-danger btn-sm" target="_blank" href="{{$pdf_url}}">Descargar PDF</a>
<a href="{{route('sistema.asesorias.laboratorios.edit', $id)}}" class="btn btn-success btn-sm" >Editar</a>
<form
    action="{{route('sistema.asesorias.laboratorios.destroy', ['laboratorio' => $id])}}"
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
