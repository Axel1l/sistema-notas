function confirmacion(evento) {
  if (confirm("¿Está seguro que desea eliminar este registro?")) {
    return true;
  } else {
    evento.preventDefault();
  }
}

let linkDelete = document.querySelectorAll(".textoEliminar");

for(var i = 0; i < linkDelete.length; i++) {
  linkDelete[i].addEventListener('click', confirmacion);
}
