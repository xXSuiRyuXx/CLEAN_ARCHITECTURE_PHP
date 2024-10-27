<?php
    require_once("../ValidateSession.php");
    require_once $_SERVER["DOCUMENT_ROOT"] . "/CLEAN_ARCHITECTURE_PHP/Domain/Models/SupplierModel.php";

    $login = @unserialize($_SESSION["supplier.login"]);
    
    if (isset($_SESSION["suppliers.all"])) {
        $_SESSION["suppliers.all"] = null;
    }

    if (isset($_SESSION["supplier.find"])) {
        $_SESSION["supplier.find"] = null;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión De Proveedores</title>
    <link rel="stylesheet" href="../../css/style.css"></link>
</head>
<body>
    <center>
        <br><span>BIENVENIDO, <b><?= $login->getName(); ?></b></span><br><br>
        <table>
            <tr>
                <th>Gestión De Proveedores</th>
            </tr>
            <tr>
                <th><a href="Create.php">Crear Proveedor<a></th>
            </tr>
            <tr>
                <th><a href="Search.php">Buscar Proveedor<a></th>
            </tr>
            <tr>
                <th><a href="../../../Controllers/SupplierController.php?action=Listar">Listar Proveedores<a></th>
            </tr>
            <tr>
                <th><a href="../../../Controllers/SupplierController.php?action=Logout">CERRAR SESION<a></th>
            </tr>
        </table>
    </center>
</body>
</html>