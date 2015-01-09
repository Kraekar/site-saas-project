<?php
/**
 * Created by PhpStorm.
 * User: knregnier
 * Date: 08/01/15
 * Time: 12:03
 */

namespace user;


class User {

    private $id;
    private $email;
    private $pseudo;
    private $firstName;
    private $lastName;
    private $corpo_id;
    private $function;

    public function __construct($id, $email, $pseudo, $firstName, $lastName, $corpo_id, $function)
    {
        $this->id = $id;
        $this->email = $email;
        $this->pseudo = $pseudo;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->corpo_id = $corpo_id;
        $this->function = $function;
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