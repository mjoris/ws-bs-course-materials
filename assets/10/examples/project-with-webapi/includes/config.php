<?php

/**
 * Config - Debug
 * ----------------------------------------------------------------
 */

	// Is debug enabled? If so, errors are shown on screen
	define('DEBUG', true);

	if (DEBUG === true) {
		ini_set('display_errors', 'on');
		error_reporting(E_ALL);
	} else {
		ini_set('display_errors', 'off');
		error_reporting(0);
	}

/**
 * Config - Database Config
 * ----------------------------------------------------------------
 */

	//Database Server Host
	define ('DB_HOST', 'localhost');

	// Database Server Username
	define ('DB_USER', 'root');

	// Database Server Password
	define ('DB_PASS', 'Azerty123');

	// Database Name
	define ('DB_NAME', 'demo-webapi');

	// Database Name
	define ('ERROR_LOG', __DIR__ . '/../error_log_mysql');

// EOF