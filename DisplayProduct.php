<?php

require('Connexion.php');
require('controllers/ProductController.php');

$controller = new Controller($connexion);
$controller->show((int)$_GET['id']);