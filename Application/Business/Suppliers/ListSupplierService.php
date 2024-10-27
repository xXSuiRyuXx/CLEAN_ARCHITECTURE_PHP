<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/CLEAN_ARCHITECTURE_PHP/Application/Contracts/Suppliers/IListSupplierService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/CLEAN_ARCHITECTURE_PHP/Application/Contracts/Suppliers/ISupplierRepository.php";

class ListSupplierService implements IListSupplierService
{
    private $supplierRepository;

    public function __construct(ISupplierRepository $supplierRepository)
    {
        $this->supplierRepository = $supplierRepository;
    }

    public function ListSuppliers(): array
    {
        return $this->supplierRepository->GetAllSuppliers();
    }
}
