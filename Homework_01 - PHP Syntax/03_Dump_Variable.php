<?php

$input = "Hello";
if (is_integer($input) || is_float($input) || is_double($input)) {
	var_dump($input);
}
else {
	echo gettype($input);
}
?>