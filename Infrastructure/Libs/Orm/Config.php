<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/CLEAN_ARCHITECTURE_PHP/Infrastructure/Libs/Orm/activerecord/ActiveRecord.php';

$cfg = ActiveRecord\Config::instance();
$cfg->set_model_directory($_SERVER["DOCUMENT_ROOT"] . '/CLEAN_ARCHITECTURE_PHP/Infrastructure/Database/Entities');
$cfg->set_connections([
    'development' => 'mysql://root:@localhost/suppliers_bd',
    'test' => 'mysql://username:password@localhost/test_database_name',
    'production' => 'mysql://username:password@localhost/production_database_name'
]);
$cfg->set_default_connection('development');