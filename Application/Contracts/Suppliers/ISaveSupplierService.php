<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/CLEAN_ARCHITECTURE_PHP/Domain/Models/SupplierModel.php";

interface ISaveSupplierService
{
    public function SaveSupplier(SupplierModel $supplier) : int;
}
