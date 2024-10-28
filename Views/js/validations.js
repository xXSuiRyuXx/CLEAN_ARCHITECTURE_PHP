function ConfirmAction(event) {
    var res = confirm("¿Deseas eliminar el proveedor?");
    if (!res) {
        event.preventDefault();
    }
}

