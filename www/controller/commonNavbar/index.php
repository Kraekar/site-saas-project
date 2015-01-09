<?php
/**
 * Created by PhpStorm.
 * User: knregnier
 * Date: 30/12/14
 * Time: 15:32
 */

require_once('controller/user/User.class.php');

$user = new \user\User($_SESSION['id']);

//display navbar
include_once('view/commonNavbar/index.phtml');