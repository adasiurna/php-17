<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //todo check input
    //todo check if position exists
    require_once 'City.php';

    City::deleteCity($_POST['id']);
 
}
//todo flash message
header('Location:index.php');
exit();