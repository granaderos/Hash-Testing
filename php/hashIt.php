<?php
/**
 * Created by PhpStorm.
 * User: Marejean
 * Date: 4/13/17
 * Time: 11:36 AM
 */

include_once "classes/Controller.php";

$obj = new Controller();
$obj->hashIt($_POST["algo"], $_POST["plainText"]);
