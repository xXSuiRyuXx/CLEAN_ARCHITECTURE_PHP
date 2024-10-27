<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/CLEAN_ARCHITECTURE_PHP/Domain/Models/SupplierModel.php";

interface ISearchSupplierService
{
    public function SearchSupplier(string $code) : SupplierModel;
}
