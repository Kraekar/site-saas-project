<?php
/**
 * Created by PhpStorm.
 * User: knregnier
 * Date: 09/01/15
 * Time: 09:55
 */

function debug_to_console( $data ) {

    if ( is_array( $data ) )
        $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
    else
        $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

    echo $output;
}