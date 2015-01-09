<?php
/**
 * Created by PhpStorm.
 * User: knregnier
 * Date: 30/12/14
 * Time: 07:58
 */

//load helpers
require_once('../app/helpers/debugTools.php');

//load config params
require_once('config/index.php');

//include db connect script
require_once('model/connexion_sql.php');


//special pages without header and footer
if (!empty($_GET['page']) && $_GET['page'] == 'login')
{
include 'controller/login/index.php';
}
//classical pages (with header, navbar, footer...), excepted homepage
elseif (!empty($_GET['page']) && is_file('controller/'.$_GET['page'].'/index.php') && $_GET['page'] !== 'index')
{
    //try to load session if exists, else redirect to login
    require_once('controller/user/handle_session.php');


    //display content

    //call common header
    include_once('controller/commonHead/index.php');
    //call navbar
    include_once('controller/commonNavbar/index.php');
    //call top bar
    include_once('controller/commonTopbar/index.php');


    include_once 'controller/'.$_GET['page'].'/index.php';


    //call common footer (javascript)
    include_once('controller/commonFooter/index.php');
}
else //else, display home page
{
    //try to load session if exists, else redirect to login
    require_once('controller/user/handle_session.php');

    //display content

    //call common header
    require_once('controller/commonHead/index.php');
    //call navbar
    require_once('controller/commonNavbar/index.php');
    //call top bar
    require_once('controller/commonTopbar/index.php');

    //call homepage
    require_once('controller/home/index.php');

    //call common footer (javascript)
    require_once('controller/commonFooter/index.php');
}

mysql_close();

