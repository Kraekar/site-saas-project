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

    public function __construct($id)
    {
        $donnees = get_user_data($id);

        //if we found one user, then start session and redirect him on admin homepage
        if(count($donnees) == 1)
        {
            foreach($donnees as $key => $donnee)
            {
                $this->id = $donnee['ID'];
                $this->email = $donnee['email'];
                $this->pseudo = $donnee['pseudo'];
                $this->firstName = $donnee['firstName'];
                $this->lastName = $donnee['lastName'];
                $this->corpo_id = $donnee['corpo_id'];
                $this->function = $donnee['function'];
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
}