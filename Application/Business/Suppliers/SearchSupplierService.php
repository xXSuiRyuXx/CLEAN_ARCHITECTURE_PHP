<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/CLEAN_ARCHITECTURE_PHP/Domain/Models/SupplierModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/CLEAN_ARCHITECTURE_PHP/Application/Contracts/Suppliers/ISearchSupplierService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/CLEAN_ARCHITECTURE_PHP/Application/Contracts/Suppliers/ISupplierRepository.php";

class SearchSupplierService implements ISearchSupplierService
{
    private $supplierRepository;

    public function __construct(ISupplierRepository $supplierRepository)
    {
        $this->supplierRepository = $supplierRepository;
    }

    public function SearchSupplier(string $code): SupplierModel
    {
        return $this->supplierRepository->GetSupplierByCode($code);
    }
}
