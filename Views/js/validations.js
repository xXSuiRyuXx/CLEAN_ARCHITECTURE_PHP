function ConfirmAction(event) {
    var res = confirm("¿Deseas eliminar el usuario?");
    if (!res) {
        event.preventDefault();
    }
}

