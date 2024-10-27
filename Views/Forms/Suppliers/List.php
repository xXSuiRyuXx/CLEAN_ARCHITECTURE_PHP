<?php 
    require_once("../ValidateSession.php");
    require_once $_SERVER["DOCUMENT_ROOT"] . "/CLEAN_ARCHITECTURE_PHP/Domain/Models/SupplierModel.php";

    $message = @$_REQUEST['message'];
    $suppliers = @$_SESSION["suppliers.all"];
    if(isset($suppliers)){
        $suppliers = unserialize($suppliers);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado De Proveedores</title>
    <link rel="stylesheet" href="../../css/style.css"></link>
    <script type="text/javascript" src="../../js/validations.js"></script>
</head>
<body>
    <center>
        <a href="index.php">REGRESAR</a>
        <h1>Lista De Proveedores</h1>
        <?php if($suppliers == null || count($suppliers) <= 0){ ?>
            <span style="color: #900D40; background-color: #FAD7CE;">NO EXISTEN PROVEEDORES REGISTRADOS</span><br>
        <?php } else { ?>
            <fieldset style="width: 40%;">
                <legend>Informacion De Los Proveedores:</legend>
                <table style="width: 95%;">
                    <tr>
                        <th>#</th>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Contacto</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th>Ciudad</th>
                        <th>Pais</th>
                        <th>Acciones</th>
                    </tr>
                    <?php foreach($suppliers as $i => $s){ ?>
                        <tr style="text-align: left;">
                            <th><?php echo ($i + 1) ?></th>
                            <th><?php echo $s->getCode(); ?></th>
                            <th><?php echo $s->getName(); ?></th>
                            <th><?php echo $s->getEmail(); ?></th>
                            <th><?php echo $s->getContact(); ?></th>
                            <th><?php echo $s->getPhone(); ?></th>
                            <th><?php echo $s->getDirection(); ?></th>
                            <th><?php echo $s->getCity(); ?></th>
                            <th><?php echo $s->getCountry(); ?></th>
                            <td style="text-align: center">
                                <a href="../../../Controllers/SupplierController.php?action=Edit&code=<?= $s->getCode(); ?>">Editar</a><br><br>
                                <a onclick="ConfirmAction(event)" href="../../../Controllers/SupplierController.php?action=Delete&code=<?= $s->getCode(); ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </fieldset>
        <?php } ?>
        <span style="color: red"><?php echo ($message != null || isset($message)) ? $message : "";?></span>
    </center>
</body>
</html>
