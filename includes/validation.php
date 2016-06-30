<?php

function validate_required($values)
{
	global $msg;

	$errors = false;

	$msg = '<ul>';
	foreach ($values as $k => $val) {
		if (empty($val)) {
			$msg .= '<li>' . sprintf(__('%s field is required'), __($k)) . "</li>\n";
			$errors = true;
		}
	}
	$msg .= '</ul>';

	if (!$errors)
		$msg = null;

	return ! $errors;
}

?>