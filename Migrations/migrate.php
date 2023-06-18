<?php
use  Doctrine\ORM\EntityManager;
use  Doctrine\ORM\ORMSetup;
require_once  __DIR__ .'/../vendor/autoload.php';

/*
    |--------------------------------------------------------------------------
    | Database Connection Name  Author: Innocent Tauzeni wa.we +263 774 914 150 :
	|               for any error encountered!!
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for a database work.
    |
    */


$modelconfig=ORMSetup::createAttributeMetadataConfiguration(
    paths: array(__DIR__ . "/Databases"),
    isDevMode: true
);

$config =array(
    'driver' => 'pdo_mysql',
    'dbname' => 'msu_fraud',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost'
);
$entityManager=EntityManager::create($config,$modelconfig);

return $entityManager;