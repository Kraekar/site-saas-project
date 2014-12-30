<?php
/**
 * Created by PhpStorm.
 * User: knregnier
 * Date: 30/12/14
 * Time: 16:39
 */

include_once('config.php');

session_start();
session_unset();
if(session_destroy())
{
    //if session is well unset and destroyed, then redirect to login page
    $host = $_SERVER['HTTP_HOST']."/".$siteWebFolder;
    $page_cible = 'login.php';
    header("Location: http://$host/$page_cible");
    exit;
}
