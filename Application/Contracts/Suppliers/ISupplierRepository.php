<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/CLEAN_ARCHITECTURE_PHP/Domain/Models/SupplierModel.php";

interface ISupplierRepository
{
    public function CountSuppliers() : int;

    public function SaveSupplier(SupplierModel $supplier) : int;

    public function GetSupplierByCode(string $code) : SupplierModel;

    public function UpdateSupplier(SupplierModel $supplier) : void;

    public function DeleteSuppierByCode(string $code) : void;

    public function GetAllSuppliers() : array;
}
