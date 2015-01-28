<?php
/**
 * Created by PhpStorm.
 * User: knregnier
 * Date: 29/12/14
 * Time: 22:07
 */

// todo Passer en POO

//if user submited the form with filled in fields
if(isset($_GET['login']) && $_GET['login'] == "try" && isset($_POST['email']) && isset($_POST['password']))
{
    include_once('model/login/index.php');

    //secure input data
    $userEmail = htmlspecialchars($_POST['email']);
    //encrypt password
    $userPassword = sha1($_POST['password']);
    //try to fetch user
    $users = is_loggable($userEmail, $userPassword);

    //if we found one user, then start session and redirect him on admin homepage
    if(count($users) == 1)
    {
        //create session
        session_start();
        foreach($users as $key => $value)
        {
            $_SESSION['ID'] = $value['ID'];
            //debug_to_console($donnee);
        }
        /* Redirection to administration home page */
        $host = $_SERVER['HTTP_HOST']."/"._SITEWEBFOLDER_;
        $targPage = 'index.php';
        header("Location: http://$host/$targPage");
        exit;
    }
    else
    {
        debug_to_console('No user found');
    }
}
else
{
    debug_to_console('Miss some entries');
}

//display the page
include_once('view/login/index.phtml');
