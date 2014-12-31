<?php
/**
 * Created by PhpStorm.
 * User: knregnier
 * Date: 29/12/14
 * Time: 21:52
 */

$databaseDSN = 'mysql:dbname='._DBNAME_.';host='._DBHOST_;

try
{
    //get user informations
    $bdd = new PDO($databaseDSN, _DBLOGIN_, _DBPASSWORD_, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}