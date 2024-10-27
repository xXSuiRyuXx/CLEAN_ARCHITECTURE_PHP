<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/CLEAN_ARCHITECTURE_PHP/Application/Contracts/Suppliers/ISupplierRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/CLEAN_ARCHITECTURE_PHP/Common/Mapper/EntityModelMapper.php";

require_once $_SERVER["DOCUMENT_ROOT"] . "/CLEAN_ARCHITECTURE_PHP/Application/Exceptions/EntityExistsException.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/CLEAN_ARCHITECTURE_PHP/Application/Exceptions/EntityNotFoundException.php";

require_once $_SERVER["DOCUMENT_ROOT"] . "/CLEAN_ARCHITECTURE_PHP/Infrastructure/Database/Entities/SupplierEntity.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/CLEAN_ARCHITECTURE_PHP/Domain/Models/SupplierModel.php";

class SupplierRepository implements ISupplierRepository
{
    /**
     * Devuelve El Total De Proveedores En La BD
     * @return int
     */
    public function CountSuppliers(): int
    {
        return SupplierEntity::count();
    }

    /**
     * Guarda Un Proveedor En La BD
     * @return int
     */
    public function SaveSupplier(SupplierModel $supplierModel): int
    {
        try {
            $supplier = $this->GetSupplierByCode($supplierModel->getCode());
            if ($supplier) {
                throw new EntityExistsException("Ya existe un proveedor con codigo '" . $supplierModel->getCode() . "'");
            }
        } catch (EntityNotFoundException $ex) {
            $supplierEntity = EntityModelMapper::SupplierModelToEntity($supplierModel);
            $supplierEntity->save();
            return $this->CountSuppliers();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    /**
     * Busca Un Proveedor En La BD
     * @return SupplierModel
     */
    public function GetSupplierByCode(string $code): SupplierModel
    {
        try {
            $supplierEntity = SupplierEntity::find($code);
            return EntityModelMapper::SupplierEntityToModel($supplierEntity);
        } catch (Exception $ex) {
            throw new EntityNotFoundException("No existe un proveedor con codigo '$code'");
        }
    }

    /**
     * Actualiza Un Proveedor En La BD
     * @return none
     */
    public function UpdateSupplier(SupplierModel $supplierModel): void
    {
        try {
            $supplierEntity = SupplierEntity::find($supplierModel->getCode());
            if ($supplierEntity) {
                $supplierEntity->code = $supplierModel->getCode();
                $supplierEntity->name = $supplierModel->getName();
                $supplierEntity->email = $supplierModel->getEmail();
                $supplierEntity->contact = $supplierModel->getContact();
                $supplierEntity->phone = $supplierModel->getPhone();
                $supplierEntity->direction = $supplierModel->getDirection();
                $supplierEntity->city = $supplierModel->getCity();
                $supplierEntity->country = $supplierModel->getCountry();
                $supplierEntity->password = $supplierModel->getPassword();
                $supplierEntity->save();
            }
        } catch (Exception $ex) {
            throw new EntityNotFoundException("No existe un proveedor con codigo '" . $supplierModel->getCode() . "'");
        }
    }

    /**
     * Elimina Un Usuario De La BD
     * @return none
     */
    public function DeleteSuppierByCode(string $code): void
    {
        try {
            $supplierEntity = SupplierEntity::find($code);
            if ($supplierEntity) {
                $supplierEntity->delete();
            }
        } catch (Exception $ex) {
            throw new EntityNotFoundException("No existe un proveedor con codigo '$code'");
        }
    }

    /**
     * Devuelve Todos Los Proveedores De La BD
     * @return array
     */
    public function GetAllSuppliers(): array
    {
        try {
            $supplierModelList = array();
            $supplierEntityList = SupplierEntity::all();
            foreach ($supplierEntityList as $supplierEntity) {
                $supplierModelList[] = EntityModelMapper::SupplierEntityToModel($supplierEntity);
            }
            return $supplierModelList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
