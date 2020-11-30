<?php
	require_once('Router.php');

	$routes = new Router();

	echo $routes->findRoute();
