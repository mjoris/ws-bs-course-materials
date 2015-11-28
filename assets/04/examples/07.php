<?php

class Weight {

	private $weight;
	private $unit;

	public function __construct($weight, $unit) {
		$this->weight = $weight;
		$this->unit = $unit;
	}

	public function __toString() {
		return $this->weight . ' ' . $this->unit;
	}
}

$myWeight = new Weight(82.5, 'kg');
?><pre><?php
var_dump($myWeight);
print_r($myWeight);
echo($myWeight);
?></pre>