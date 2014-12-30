<?php
/**
 * Created by PhpStorm.
 * User: knregnier
 * Date: 30/12/14
 * Time: 07:58
 */

//load config params
include_once('config.php');

//include db connect script
include_once('model/connexion_sql.php');
//try to load session, or logout
include_once('model/handle_session.php');

if (!isset($_GET['section']) OR $_GET['section'] == 'index')
{
    //call common header
    include_once('controller/commonHead/index.php');
    //call navbar
    include_once('controller/commonNavbar/index.php');
    //call top bar
    include_once('controller/commonTopbar/index.php');
    //call main content
    include_once('controller/main-dashboard/index.php');

    //call common footer (javascript)
    include_once('controller/commonFooter/index.php');
}