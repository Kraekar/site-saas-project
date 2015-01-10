<?php
/**
 * Created by PhpStorm.
 * User: knregnier
 * Date: 08/01/15
 * Time: 12:03
 */

namespace user;

require_once('model/user/get_user_data.php');

class User {

    protected $id;
    protected $email;
    protected $pseudo;
    protected $firstName;
    protected $lastName;
    protected $corpo_id;
    protected $function;

    protected $userData = array();

    public function __construct($id)
    {
        $donnees = get_user_data($id);

        //if we found one user, then start session and redirect him on admin homepage
        if(count($donnees) == 1)
        {
            foreach($donnees as $key => $donnee)
            {
                //cleanData with output mode does nl2br(htmlentities)
                $this->userData['id'] = cleanData("output", $donnee['ID']);
                $this->userData['email'] = cleanData("output", $donnee['email']);
                $this->userData['pseudo'] = cleanData("output", $donnee['pseudo']);
                $this->userData['firstName'] = cleanData("output", $donnee['firstName']);
                $this->userData['lastName'] = cleanData("output", $donnee['lastName']);
                $this->userData['corpo_id'] = cleanData("output", $donnee['corpo_id']);
                $this->userData['function'] = cleanData("output", $donnee['function']);
            }
        }
        else
        {
            debug_to_console('User not found');
        }
    }

    public function __toString()
    {
        return "<em>Informations de l'utilisateur : <br>
        id = ".$this->id."<br>
        email = ".$this->email."<br>
        pseudo = ".$this->pseudo."<br>
        firstName = ".$this->firstName."<br>
        lastName = ".$this->lastName."<br>
        corpo_id = ".$this->corpo_id."<br>
        function = ".$this->function."<br></em>";
    }
    public function getFullName()
    {
        return $this->userData['firstName'] . " " . $this->userData['lastName'];
    }

    public function __get($name = null)
    {
        return $this->userData[$name];
    }
}