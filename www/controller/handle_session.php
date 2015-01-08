<?php
/**
 * Created by PhpStorm.
 * User: knregnier
 * Date: 30/12/14
 * Time: 16:18
 */

//start session
session_start();

//is there any user logged in ?
if(!isset($_SESSION['ID']) or is_null($_SESSION['ID']))
{
    //if NO, then redirect to login page
    $host = $_SERVER['HTTP_HOST']."/"._SITEWEBFOLDER_;
    $page_cible = 'login.php';
    header("Location: http://$host/$page_cible");
    exit;
}