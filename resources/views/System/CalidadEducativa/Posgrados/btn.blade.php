@hasanyrole('SuperAdmin')
@IF($active == 0){{-- @if($vision) --}}
<form
    action="{{route('sistema.calidad-educativa.posgrados.approve', $id)}}"
    class="d-inline formapprove" method="POST">
    @method('PUT')
    @csrf
    <button class="btn btn-primary btn-sm data" type="submit">Aprobar
    </button>
</form>
@endif
@endhasanyrole
<!--<a class="btn btn-primary btn-sm">Confirmar</a>-->
<a href="{{route('sistema.calidad-educativa.posgrados.edit', $id)}}" class="btn btn-success btn-sm" >Editar</a>
