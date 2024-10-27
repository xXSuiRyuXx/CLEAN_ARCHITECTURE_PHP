<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/CLEAN_ARCHITECTURE_PHP/Domain/Models/SupplierModel.php";

interface IUpdateSupplierService
{
    public function UpdateSupplier(SupplierModel $supplier) : void;
}
