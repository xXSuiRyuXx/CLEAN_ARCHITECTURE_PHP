<?php 
    require_once("../ValidateSession.php");
    require_once $_SERVER["DOCUMENT_ROOT"] . "/CLEAN_ARCHITECTURE_PHP/Domain/Models/SupplierModel.php";

    $message = @$_REQUEST['message'];
    $supplier = @$_SESSION["supplier.find"];
    if(isset($supplier)){
        $supplier = unserialize($supplier);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizacion De Proveedor</title>
    <script type="text/javascript" src="../../js/validations.js" type=""></script>
</head>
<body>
    <center>
        <a href="../../../Controllers/SupplierController.php?action=Listar">REGRESAR</a>
        <h1>Actualizacion De Proveedor</h1><hr>
        <form action="../../../Controllers/SupplierController.php" method="POST">
            <table>
                <tr>
                    <th style="text-align: right">Codigo:</th>
                    <td>
                        <input type="text" name="code" id="code" value="<?= $supplier != null ? @$supplier->getCode() : ""; ?>"
                        required placeholder="Digite el codigo" readonly>
                    </td>
                </tr>
                <tr>
                    <th style="text-align: right">Nombre:</th>
                    <td><input type="text" name="name" id="name" value="<?= $supplier != null ? @$supplier->getName() : ""; ?>"></td>
                </tr>
                <tr>
                    <th style="text-align: right">Correo:</th>
                    <td><input type="email" name="email" id="email" value="<?= $supplier != null ? @$supplier->getEmail() : ""; ?>"></td>
                </tr>
                <tr>
                    <th style="text-align: right">Contacto:</th>
                    <td><input type="text" name="contact" id="contact" value="<?= $supplier != null ? @$supplier->getContact() : ""; ?>"></td>
                </tr>
                <tr>
                    <th style="text-align: right">Telefono:</th>
                    <td><input type="text" name="phone" id="phone" value="<?= $supplier != null ? @$supplier->getPhone() : ""; ?>"></td>
                </tr>
                <tr>
                    <th style="text-align: right">Direccion:</th>
                    <td><input type="text" name="direction" id="direction" value="<?= $supplier != null ? @$supplier->getDirection() : ""; ?>"></td>
                </tr>
                <tr>
                    <th style="text-align: right">Ciudad:</th>
                    <td><input type="text" name="city" id="city" value="<?= $supplier != null ? @$supplier->getCity() : ""; ?>"></td>
                </tr>
                <tr>
                    <th style="text-align: right">Pais:</th>
                    <td><input type="text" name="country" id="country" value="<?= $supplier != null ? @$supplier->getCountry() : ""; ?>"></td>
                </tr>
                <tr>
                    <th style="text-align: right">Contraseña:</th>
                    <td><input type="password" name="password" id="password" value="<?= $supplier != null ? @$supplier->getPassword() : ""; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center">
                        <input type="reset" value="Limpiar">
                        <input type="submit" id="action" name="action" value="Actualizar">
                    </td>
                </tr>
            </table>
        </form>
        <span style="color: red"><?= ($message != null || isset($message)) ? $message : "";?></span>
    </center>
</body>
</html>