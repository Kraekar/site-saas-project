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
    //get all personal data from the current user
    include_once('model/login/get_user_data.php');

    //secure input data
    $userEmail = htmlspecialchars($_POST['email']);
    //encrypt password
    $userPassword = sha1($_POST['password']);
    $donnees = get_user_data($userEmail, $userPassword);

    //if we found one user, then start session and redirect him on admin homepage
    if(count($donnees) == 1)
    {
        //create session
        session_start();

        foreach($donnees as $key => $donnee)
        {
            $_SESSION['ID'] = $donnee['ID'];
            $_SESSION['pseudo'] = $donnee['pseudo'];
            $_SESSION['email'] = $donnee['email'];
            $_SESSION['password'] = $donnee['password'];
            $_SESSION['corpo_id'] = $donnee['corpo_id'];
            $_SESSION['firstName'] = $donnee['firstName'];
            $_SESSION['lastName'] = $donnee['lastName'];
            $_SESSION['function'] = $donnee['function'];

        }

        /* Redirection to administration home page */
        $host = $_SERVER['HTTP_HOST']."/".$siteWebFolder;
        $page_cible = 'index.php';
        header("Location: http://$host$uri/$page_cible");
        exit;
    }
}

//display the page
include_once('view/login/index.phtml');
