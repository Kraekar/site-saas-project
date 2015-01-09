<?php
/**
 * Created by PhpStorm.
 * User: knregnier
 * Date: 09/01/15
 * Time: 10:05
 */

function get_user_data($userId)
{
    //database connexion has already been, get here the given object
    global $bdd;

    //get user data for regarding email and password
    $reponse = $bdd->prepare('SELECT * FROM users WHERE users.id = :userId LIMIT 0,1');

    //Execute query with prepared data
    $reponse->execute(array('userId' => $userId));

    $donnees = $reponse->fetchAll(PDO::FETCH_ASSOC);

    return $donnees;
}