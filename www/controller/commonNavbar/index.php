<?php
/**
 * Created by PhpStorm.
 * User: knregnier
 * Date: 30/12/14
 * Time: 15:32
 */

require_once('controller/user/User.class.php');

//construct user from ID in session
$user = new \user\User($_SESSION['ID']);

//display navbar
include_once('view/commonNavbar/index.phtml');