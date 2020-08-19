<?php

require_once 'Init.php';
$db = new DB();
if(Phone::validate('phone') != false && Name::validate($_POST['name']))
    $db->insert('contact', $_POST['name'], $_POST['phone']);

header('Location: ../index.php');
