<?php 
    session_start();
    $supplier = @$_SESSION["supplier.login"];
    $supplier = @unserialize($supplier);
    if(!$supplier){
        $urlBase = $_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["HTTP_HOST"]."/CLEAN_ARCHITECTURE_PHP/Views/Forms/Suppliers/Login.php";
        header("Location: $urlBase");
        exit;
    }

