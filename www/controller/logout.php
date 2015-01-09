<?php
/**
 * Created by PhpStorm.
 * User: knregnier
 * Date: 30/12/14
 * Time: 16:39
 */

require_once('../config/index.php');

session_start();
session_unset();
if(session_destroy())
{
    //if session is well unset and destroyed, then redirect to login page
    $host = $_SERVER['HTTP_HOST']._SITEWEBFOLDER_;
    $page_cible = 'index.php?page=login';
    header("Location: http://$host/$page_cible");
    exit;
}
