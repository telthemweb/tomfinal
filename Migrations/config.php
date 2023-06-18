<?php
use Doctrine\DBAL\DriverManager;

return DriverManager::getConnection([
    'driver'=>'pdo_mysql',
    'dbname'=>'msu_fraud',
    'user'=>'root',
    'password'=>'',
    'host'=>'localhost'
]);