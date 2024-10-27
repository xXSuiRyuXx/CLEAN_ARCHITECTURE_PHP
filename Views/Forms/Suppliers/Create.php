<?php 
    require_once("../ValidateSession.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro De Proveedor</title>
</head>
<body>
    <center>
        <a href="index.php">REGRESAR</a>
        <h1>Registro De Proveedor</h1>
        <form action="../../../Controllers/SupplierController.php" method="POST">
            <fieldset style="width: 30%;">
                <legend>Datos Del Proveedor: </legend>
                <table border="1" style="width: 90%;">
                    <tr>
                        <th style="text-align: center">Codigo:</th>
                        <td><input type="number" name="code" id="code" required placeholder="Digite el codigo" style="width: 98%;"></td>
                    </tr>
                    <tr>
                        <th style="text-align: center">Nombre:</th>
                        <td><input type="text" name="name" id="name" required placeholder="Digite el nombre" style="width: 98%;"></td>
                    </tr>
                    <tr>
                        <th style="text-align: center">Correo:</th>
                        <td><input type="email" name="email" id="email" placeholder="Digita el email" style="width: 98%;"></td>
                    </tr>
                    <tr>
                        <th style="text-align: center">Contacto:</th>
                        <td><input type="text" name="contact" id="contact" required placeholder="Digite el contacto" style="width: 98%;"></td>
                    </tr>
                    <tr>
                        <th style="text-align: center">Telefono:</th>
                        <td><input type="text" name="phone" id="phone" required placeholder="Digite el telefono" style="width: 98%;"></td>
                    </tr>
                    <tr>
                        <th style="text-align: center">Direccion:</th>
                        <td><input type="text" name="direction" id="direction" required placeholder="Digite la direccion" style="width: 98%;"></td>
                    </tr>
                    <tr>
                        <th style="text-align: center">Ciudad:</th>
                        <td><input type="text" name="city" id="city" required placeholder="Digite la ciudad" style="width: 98%;"></td>
                    </tr>
                    <tr>
                        <th style="text-align: center">Pais:</th>
                        <td><input type="text" name="country" id="country" required placeholder="Digite el pais" style="width: 98%;"></td>
                    </tr>
                    <tr>
                        <th style="text-align: center">Contraseña:</th>
                        <td><input type="password" name="password" id="password" placeholder="Digite la clave" style="width: 98%;"></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td colspan="2" style="text-align: center">
                            <input type="reset" value="Limpiar">&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="submit" id="action" name="action" value="Guardar">
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
        <span style="color: red"><?php echo @$_REQUEST["message"]; ?></span>
    </center>
</body>
</html>