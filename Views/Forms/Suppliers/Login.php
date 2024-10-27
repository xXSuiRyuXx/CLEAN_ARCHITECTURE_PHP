<?php
    session_start();

    $message = @$_REQUEST['message'];
    $supplier = @$_SESSION["supplier.login"];
    $supplier = @unserialize($supplier);
    if($supplier){
        header("Location: index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
    <link rel="stylesheet" href="../../css/style.css"></link>
</head>
<body class="Sesion">
    <center>
        <h1>Iniciar Sesion</h1>
        <form action="../../../Controllers/SupplierController.php" method="POST">
            <fieldset style="width: 25%;">
                <legend>Datos De Acceso:</legend>
                <table>
                    <tr>
                        <th style="text-align: right">Codigo:</th>
                        <td><input type="text" name="code" id="code" required placeholder="Digite el codigo"></td>
                    </tr>
                    <tr>
                        <th style="text-align: right">Contraseña:</th>
                        <td><input type="password" name="password" id="password" placeholder="Digite la contraseña"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center">
                            <input type="reset" id="limpiar" value="Limpiar">
                            <input type="submit" id="action" name="action" value="Login">
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
        <span style="color: red"><?php echo ($message != null || isset($message)) ? $message : "";?></span>
    </center>
</body>
</html>