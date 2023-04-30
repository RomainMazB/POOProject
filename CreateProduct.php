<?php

require('Connexion.php');
require('controllers/ProductController.php');

$controller = new Controller($connexion);
$controller->create();