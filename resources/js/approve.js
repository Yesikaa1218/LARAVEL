

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