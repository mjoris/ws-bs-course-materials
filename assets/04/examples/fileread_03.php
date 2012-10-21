<?php

/**
 * Get contents of a file into an array
 * @author Bramus Van Damme <bramus.vandamme@kahosl.be>
 */

	$lines = file('./testfile.txt');
	
	// Loop through our array, show line and line numbers too.
	foreach ($lines as $line_num => $line) {
		echo '<strong>#' . $line_num . ':</strong> ' . $line . '<br />' . PHP_EOL;
	}

// EOF