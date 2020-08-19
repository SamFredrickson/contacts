<?php

require_once 'Init.php';
$db = new DB();
$db->delete('contact', $_POST['id']);