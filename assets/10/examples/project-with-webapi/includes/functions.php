<?php

	/**
	 * Gets the DB connection
	 * @return PDO The DB Connection
	 */
	function getDatabase() {
		try {
			$db = new PDO('mysql:host=' . DB_HOST .';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $db;
		} catch (PDOException $e) {
            http_response_code(503); // 503 Service Unavailable
            file_put_contents(ERROR_LOG, PHP_EOL . (new DateTime())->format('Y-m-d H:i:s') . ' : ' . $e->getMessage(), FILE_APPEND);
            exit;
		}
	}

// EOF