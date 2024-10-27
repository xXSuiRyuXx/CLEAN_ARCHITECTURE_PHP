<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/CLEAN_ARCHITECTURE_PHP/Domain/Models/SupplierModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/CLEAN_ARCHITECTURE_PHP/Application/Contracts/Suppliers/ISaveSupplierService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/CLEAN_ARCHITECTURE_PHP/Application/Contracts/Suppliers/ISupplierRepository.php";

class SaveSupplierService implements ISaveSupplierService
{
    private $supplierRepository;

    public function __construct(ISupplierRepository $supplierRepository)
    {
        $this->supplierRepository = $supplierRepository;
    }

    public function SaveSupplier(SupplierModel $supplier): int
    {
        return $this->supplierRepository->SaveSupplier($supplier);
    }
}
