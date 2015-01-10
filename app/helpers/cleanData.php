<?php
/**
 * Created by PhpStorm.
 * User: knregnier
 * Date: 10/01/15
 * Time: 10:12
 */

function cleanData($mode = "output", $data)
{
    if($mode == "output")
    {
        $data = nl2br(htmlentities($data,ENT_QUOTES,'ISO-8859-15'));

        return $data;
    }
    else
    {
        return($data);
    }

}