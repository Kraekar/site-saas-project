<?php
/**
 * Created by PhpStorm.
 * User: knregnier
 * Date: 29/12/14
 * Time: 22:02
 */

// todo Passer en POO

function get_user_data($userEmail, $userPassword)
{
    //database connexion has already been, get here the given object
    global $bdd;

    //get user data for regarding email and password
    $reponse = $bdd->prepare('SELECT * FROM users WHERE users.email = :email AND users.password = :password LIMIT 0,1');

    //Execute query with prepared data
    $reponse->execute(array('email' => $userEmail, 'password' => $userPassword));

    $donnees = $reponse->fetchAll();

    return $donnees;
}
