<?php

require('Connexion.php');
require('controllers/ProductController');

$controller = new Controller($connexion);
$controller->delete((int)$_GET['id']);