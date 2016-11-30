<?php

	// start session (starts a new one, or continues the already started one)
	session_start();

	// get user id from session
	$userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
	
	// retrieve user info from database if you want to use this info (!)
	$user = array(
				'username' => 'nameFromDB',
				'id' => $userId,
				'email' => 'nameFromDB@odisee.be'
			);

?><!DOCTYPE html>
<html lang="en">
<head>
	<title>My login protected site</title>

	<meta charset="utf-8" />

	<style>
		.note {
			background: #FFFF99;
		}

		.active {
			font-weight: 700;
		}
	</style>

</head>
<body>

	<h1>My login protected site</h1>

	<ul>
	<?php if ($userId) { ?>
		<li>You are logged in. Welcome, <?php echo htmlentities($user['username']); ?> (<a href="logout.php">log out</a>)</li>
	<?php } else { ?>
		<li>You are not logged in. Please <a href="login.php" title="log in">log in</a></li>
	<?php } ?>
	</ul>

	<h2>Navigation</h2>
	<ul>
		<li><a href="index.php">Page 1</a></li>
		<li><a href="index2.php">Page 2</a></li>
		<li><a href="index3.php" class="active">Page 3</a></li>
	</ul>

</body>
</html>