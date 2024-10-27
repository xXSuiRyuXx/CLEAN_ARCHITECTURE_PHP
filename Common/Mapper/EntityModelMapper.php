<?php 

require_once $_SERVER["DOCUMENT_ROOT"] . "/CLEAN_ARCHITECTURE_PHP/Infrastructure/Database/Entities/SupplierEntity.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/CLEAN_ARCHITECTURE_PHP/Domain/Models/SupplierModel.php";

class EntityModelMapper 
{
    public static function SupplierEntityToModel(SupplierEntity $entity) : SupplierModel
    {
        return new SupplierModel(
            $entity->code,
            $entity->name,
            $entity->email,
            $entity->contact,
            $entity->phone,
            $entity->direction,
            $entity->city,
            $entity->country,
            $entity->password,
            $entity->created_at->format('Y-m-d H:i:s')
        );
    }

    public static function SupplierModelToEntity(SupplierModel $model) : SupplierEntity
    {
        $entity = new SupplierEntity();
        $entity->code = $model->getCode();
        $entity->name = $model->getName();
        $entity->email = $model->getEmail();
        $entity->contact = $model->getContact();
        $entity->phone = $model->getPhone();
        $entity->direction = $model->getDirection();
        $entity->city = $model->getCity();
        $entity->country = $model->getCountry();
        $entity->password = $model->getPassword();
        $entity->created_at = $model->getCreatedAt();

        return $entity;
    }

}