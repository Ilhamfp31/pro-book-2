<?php
	// Grabs the URI and breaks it apart in case we have querystring stuff
	$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
	// Route it up!
	switch ($request_uri[0]) {
		// // Home page
		case '/':
		case '/login':
			require 'view/login.php';
			break;
		// About page
		case '/register':
			require 'view/register.php';
			break;
		// Search
		case '/search':
			require 'view/search.php';
			break;
		// History
		case '/history':
			require 'view/history.php';
			break;
		// Profile
		case '/profile';
			require 'view/profile.php';
			break;
		// Everything else
		default:
			header('HTTP/1.0 404 Not Found');
			break;
	}
?>