<?php
/**
 * Created by PhpStorm.
 * User: knregnier
 * Date: 29/12/14
 * Time: 21:52
 */

$databaseDSN = 'mysql:dbname='.$databaseName.';host='.$databaseHost;

try
{
    //get user informations
    $bdd = new PDO($databaseDSN, $databaseLogin, $databasePassword, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}