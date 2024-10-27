<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/CLEAN_ARCHITECTURE_PHP/Infrastructure/Libs/Orm/Config.php';

class SupplierEntity extends ActiveRecord\Model
{
    public static $table_name = "suppliers";

    public static $primary_key = "code";
}
