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

    public function getProfilePicturePath($size = "orignal")
    {
        //get some functions for picture manipulations
        require_once('../app/helpers/mediaManipulations.php');

        //original profile picture path
        $ProfileOriginalPicturePath = "medias/pictures/profiles/profile_original_".$this->userData['id'].".jpg";

        switch($size)
        {
            case 'small' :
                $ProfilePicturePath = "medias/pictures/profiles/profile_small_".$this->userData['id'].".jpg";
                //callback size
                $sizeHeight = "48";
                $sizeWidh = "48";
                break;

            case 'medium' :
                $ProfilePicturePath = "medias/pictures/profiles/profile_medium_".$this->userData['id'].".jpg";
                //callback size
                $sizeHeight = "120";
                $sizeWidh = "120";
                break;

            case 'big' :
                $ProfilePicturePath = "medias/pictures/profiles/profile_big_".$this->userData['id'].".jpg";
                //callback size
                $sizeHeight = "240";
                $sizeWidh = "240";
                break;

            case 'original' :
                $ProfilePicturePath = $ProfileOriginalPicturePath;
                break;
        }

        //if wanted picture size doesn't exist, then create it from original one
        if(!file_exists($ProfilePicturePath))
        {
            if (true !== ($pic_error = @c_image_resize($ProfileOriginalPicturePath, $ProfilePicturePath, $sizeHeight, $sizeWidh, 1))) {
                debug_to_console($pic_error);
            }
            debug_to_console("Resizing OK");
        }

        return $ProfilePicturePath;

    }
}