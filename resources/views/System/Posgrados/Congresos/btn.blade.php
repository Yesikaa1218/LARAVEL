@hasanyrole('SuperAdmin')
@if($status == 0)
<form
    action="{{route('sistema.posgrados.congresos.approve', $id)}}"
    class="d-inline formapprove " method="POST">
    @method('PUT')
    @csrf
    <button class="btn btn-primary btn-sm" type="submit">Aprobar
    </button>
</form>
@endif 
@endhasanyrole

<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Opciones
  </button>
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
<form
action="{{route('sistema.congresos-posgrado.index', $id)}}"
class="d-inline " method="GET">
    @method('GET')
    @csrf
    <button class="dropdown-item" type="submit">Ver registros
    </button>
</form>
@if($registro_activo == 0)
<form
    action="{{route('sistema.posgrados.congresos.active', $id)}}"
    class="d-inline formactivar " method="POST">
    @method('PUT')
    @csrf
    <button class="dropdown-item" type="submit">Activar registro
    </button>
</form>
@else
<form
    action="{{route('sistema.posgrados.congresos.active', $id)}}"
    class="d-inline formdesactivar " method="POST">
    @method('PUT')
    @csrf
    <button class="dropdown-item" type="submit">Desactivar registro
    </button>
</form>
@endif

<div class="dropdown-divider"></div>
<!-- <form
    action="{{route('sistema.posgrados.congresos.active', $id)}}"
    class="d-inline formregistro " method="POST">
    @method('PUT')
    @csrf
    @if($registro_activo == 0)
    <button class="btn btn-primary btn-sm" type="submit">Activar registro
    </button>
    @else
    <button class="btn btn-primary btn-sm" type="submit">Desactivar registro
    </button>
    @endif
</form> -->

<a href="{{route('sistema.posgrados.congresos.edit', $id)}}" class="dropdown-item" >Editar</a>

<form
    action="{{route('sistema.posgrados.congresos.destroy', ['congreso' => $id])}}"
    class="d-inline formdelete" method="POST">
    @method('DELETE')
    @csrf
    <button class="dropdown-item" type="submit">Eliminar
    </button>
</form>
</div>
</div>

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

    $('.formactivar').submit(function(e){
        e.preventDefault();
        Swal.fire({
            title: '¿Seguro que desea activar el registro de este congreso?',
            text: "Una vez activado, cualquier usuario podrá registrarse en el congreso",
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

    $('.formdesactivar').submit(function(e){
        e.preventDefault();
        Swal.fire({
            title: '¿Seguro que desea desactivar el registro de este congreso?',
            text: "Una vez desactivado, ningún usuario podrá registrarse en el congreso",
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