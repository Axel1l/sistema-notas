<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

function alertaEliminar() {
    Swal.fire({
        title: 'Estas seguro de eliminar ?',
        text: "No podras revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si, Borralo!'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'Eliminado!',
            'Se a Eliminado Correctamente.',
            'success'
          )
        }
      })
}