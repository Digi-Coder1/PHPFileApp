<?php

require_once dirname(__DIR__) . '/includes/session.php';

if ($_REQUEST) {

	$dir_path = dirname(__DIR__) . "/files/";
	$dir_name = $_REQUEST["dir_name"];
	$full_path = $dir_path . $dir_name;
	$errors = [];

	if (!preg_match('/^[\w]*$/', $_REQUEST["dir_name"])) {
		$errors[] = 'Folder name should contain only alpha-numeric characters along with underscores';
	}

	if (strlen($dir_name) > 20) {
		$errors[] = 'Directory name must not exceed 20 characters';
	}

	if (file_exists($full_path)) {
		$errors[] = 'Directory <b>{' . $dir_name . '}</b> already exists.';
	}

	if (empty($errors) && !mkdir($full_path)) {
		$errors[] = 'An error occured while creating Directory <b>{' . $dir_name . '}</b>';
	}

	$msg = empty($errors) ? 'Directory <b>{' . $dir_name . '}</b> created successfully' : $errors[0];
	$msg_type = empty($errors) ? 'alert-success' : 'alert-danger';

	$_SESSION['flash_message'] = $msg;
	$_SESSION['flash_message_type'] = $msg_type;
	$location = empty($errors) ? 'http://localhost:8080/public/folders.php' : $_REQUEST['ref_page'];

	header('Location: ' . $location);
	exit();
}

?>
