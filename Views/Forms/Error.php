<?php 
    $message = @$_REQUEST['message'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ha ocurrido un error</title>
</head>
<body>
    <center>
        <h1>Ha ocurrido un error</h1>
        <hr>
        <span style="color: #900D40; background-color: #FAD7CE">
            <?php echo ($message != null || isset($message)) ? $message : ""; ?>
        </span>
    </center>
</body>
</html>

