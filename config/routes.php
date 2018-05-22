<?php
$routes = new \AdmBereich\Router();
$routes->namespace = DEFAULT_NAMESPACE;

$routes->get('', 'Main/index');