@hasanyrole('SuperAdmin')
@if($active === 0)
<form
    action="{{route('sistema.facultad.informes.approve', $id)}}"
    class="d-inline formapprove" method="POST">
    @method('PUT')
    @csrf
    <button class="btn btn-primary btn-sm data" type="submit">Aprobar
    </button>
</form>
@endif
@endhasanyrole

@if($pdf)
<a class="btn btn-outline-danger btn-sm" target="_blank" href="/storage/{{$pdf}}">Descargar PDF</a>
@endif
<a href="{{route('sistema.facultad.informes.edit', $id)}}" class="btn btn-success btn-sm" >Editar</a>
<form
    action="{{route('sistema.facultad.informes.destroy', ['informe' => $id])}}"
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
